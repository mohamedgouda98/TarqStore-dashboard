
function confirmDelete(id,actionUrl)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    Swal.fire({
                title: `Are you sure you want to delete this record ?`,
                text: "If you delete this, it will be gone forever.",
                icon: 'warning',
                padding: '3em',
                showCancelButton: true,
                confirmButtonText: 'Yes !'
        }).then((result) => {
        if (result.value = true) {
            $.ajax({
                url: `/admin/${actionUrl}/delete`,
                method: 'DELETE',
                data: {'id': id},
                success: function (res) {
                    if (res == 1) {
                        $('#'+id).remove()
                        Swal.fire(
                            'Removed!',
                            `Record Has Been Removed !`,
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Error!',
                            `Error : ${res} !`,
                            'error'
                        )
                    }
                }
            });
        }

    });
}

function updateInput(value)
{
    $("#valueInput").prop('type', value);
    $("#valueInput").attr('value', '');
}
