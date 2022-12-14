<script>
    $(document).ready(function() {
        $('.favButton').click(function() {
            if ($('#favButton').hasClass('activeFavButton')) {
                $('#favButton').removeClass('activeFavButton')
            } else {
                $('#favButton').addClass('activeFavButton')
            }

            $.post("Assets/js/ajax/followShow.php", {
                idUser: "<?php echo $_SESSION['id'] ?>",
                idShow: "<?php echo $_GET['id'] ?>"
            }, function(data) {
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Ajoutée à la liste des séries suivies'
                    })
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Retirée de la liste des séries suivies'
                    })
                }
            });
        });

        tippy('#favButton', {
            theme: 'light',
            content: 'Ajouter à ma liste de suivi',
            animation: 'fade',
        });
    });
</script>


<?php
/*
ShowBizFlex - 2022/12/05
GNU GPL CopyLeft 2022-2032
Initiated by Rachid ABDOULALIME - Steven CHING - Yanis HAMANI
WebSite : <https://dev.showbizflex.com/>
*/
?>