import './bootstrap';

$(document).ready(function() {

    $('#company').on('change', function() {
        var company_id = $(this).val();
        $.ajax({
            url: '{{ route('projects.persons') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                company_id: company_id
            },
            success: function(response) {
                $('#persons').empty();
                $.each(response, function(index, person) {
                    $('#persons').append('<option value="' + person.id + '">' +
                        person.full_name + '</option>');
                });

                $('#persons-checkboxes').empty();
                $.each(response, function(index, person) {
                    $('#persons-checkboxes').append(
                        '<input type="checkbox" name="persons[]" value="' +
                        person.id + '"> ' + person.full_name + '<br>');
                });
            }
        });
    });
});
