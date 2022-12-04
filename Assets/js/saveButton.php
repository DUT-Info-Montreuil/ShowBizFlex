<script>
    $(document).ready(function() {
        $('.saveButton').click(function() {

            if ($('#saveButton').hasClass('activeSaveButton')) {
                $('#saveButton').removeClass('activeSaveButton')
            } else {
                $('#saveButton').addClass('activeSaveButton')
            }

            $.post("Assets/js/ajax/saveShow.php", {
                idUser: "<?php echo $_SESSION['id'] ?>",
                idShow: "<?php echo $_GET['id'] ?>"
            }, function(data) {
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Ajoutée à la liste des séries à regarder plus tard'
                    })
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Retirée de la liste des séries à regarder plus tard'
                    })
                }
            });

        });

        tippy('#saveButton', {
            theme: 'light',
            content: 'Ajouter à ma liste à regarder plus tard',
            animation: 'fade',
        });


    });
</script>