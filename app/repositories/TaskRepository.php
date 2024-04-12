<?php

namespace App\Repositories;

use App\Models\Task;

use App\Models\Project;
use App\Models\Person;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Auth;

class TaskRepository
{
    public function getLoginUser()
    {
        $loggedInUser = Auth::user();
      
        return Person::where('user_id', $loggedInUser->id)->first()->full_name;
    }
    public function getAll()
    {
        $loggedInUser = Auth::user();
        $roleNames = $loggedInUser->roles->pluck('role')->toArray();
        $person = Person::where('user_id', $loggedInUser->id)->first();
        if (in_array('admin', $roleNames)) {
            $tasks = Task::with('project', 'person')->paginate(3);
        } else {
            $personId = $person->id;
            $tasks = Task::with('project', 'person')
                ->where('person_id',$personId)
                ->paginate(3);
        }
        $tasks->getCollection()->transform(function ($task) {
            $company = $task->person->company->name;
            $project = $task->project->name;
            $person = $task->person->full_name;
            $statusName = $task->getStatusName();
            $priorityName = $task->getPriorityName();

            $task = $task->toArray();
            $task['project'] = $project;
            $task['person'] = $person;
            $task['company'] = $company;
            $task['status'] = $statusName;
            $task['priority'] = $priorityName;
            return $task;
        });
        return $tasks;
    }
    public function getProject()
    {
        return Project::all();
    }
    public function getAllPerson()
    {
        return Person::all();
    }

    public function Search($searchTerm)
    {
        $tasks = Task::where('name', 'like', '%' . $searchTerm . '%')
            ->with('person.company', 'project')
            ->paginate(3);

        $tasks->getCollection()->transform(function ($task) {
            $company = $task->person->company->name;
            $project = $task->project->name;
            $person = $task->person->full_name;
            $statusName = $task->getStatusName();
            $priorityName = $task->getPriorityName();

            $task = $task->toArray();
            $task['project'] = $project;
            $task['person'] = $person;
            $task['company'] = $company;
            $task['status'] = $statusName;
            $task['priority'] = $priorityName;
            return $task;
        });
        return $tasks;
    }
    public function getPersons($projectId)
    {
        $persons = Person::whereHas('projects', function ($query) use ($projectId) {
            $query->where('project_id', $projectId);
        })->get();

        return $persons;
    }
    public function filterCompany($projectId)
    {
        $company = Person::whereHas('projects', function ($query) use ($projectId) {
            $query->where('project_id', $projectId);
        })->get();

        return $company;
    }

    public function getById($id)
    {
        return Task::findOrFail($id);
    }

    public function create(array $data)
    {
        try {
            unset($data['_token']);
            $task = new Task();
            $task->project_id = $data['project_id'];
            $task->person_id = $data['persons'][0];
            $task->start_time = $data['start_time'];
            $task->end_time = $data['end_time'];
            $task->priority = $data['priority'];
            $task->name = $data['name'];
            $task->description = $data['description'];
            $task->status = $data['status'];
            $task->save();
            return $task;
        } catch (\Exception $th) {
            throw new \Exception('Failed to create Task. Please check the information again.');
        }
    }

    public function update($id, $data)
    {
        try {
            $task = Task::findOrFail($id);

            $task->update([
                'project_id' => $data['project_id'],
                'person_id' => $data['persons'][0],
                'start_time' => $data['start_time'],
                'end_time' => $data['end_time'],
                'priority' => $data['priority'],
                'name' => $data['name'],
                'description' => $data['description'],
                'status' => $data['status'],
            ]);

            return $task;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $task = Task::findOrFail($id);

            if ($task) {
                return $task->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function exportTasks($tasks)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Project');
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'Start Time');
        $sheet->setCellValue('D1', 'End Time');
        $sheet->setCellValue('E1', 'Priority');
        $sheet->setCellValue('F1', 'Status');
        $sheet->setCellValue('G1', 'Person');

        $row = 2;
        foreach ($tasks as $task) {
            $sheet->setCellValue('A' . $row, $task->project->name);
            $sheet->setCellValue('B' . $row, $task->description);
            $sheet->setCellValue('C' . $row, $task->start_time);
            $sheet->setCellValue('D' . $row, $task->end_time);
            $sheet->setCellValue('E' . $row, $task->getPriorityName());
            $sheet->setCellValue('F' . $row, $task->getStatusName());
            $sheet->setCellValue('G' . $row, $task->person->full_name);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/tasks.xlsx');
        $writer->save($filePath);

        return $filePath;
    }
    public function getAllWithRelations()
    {
        return Task::with('project', 'person')->get();
    }
}
