$(document).ready(function() {
    $('#nacionalidade').change(function(event) {
        $('#nacionalidade_responsavel').value = $(this).value;
    });
});