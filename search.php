<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Live Search Example</title>
</head>
<body>
<button type="button" id="search">Search</button>
<input type="text" id="data-box">
    <div id="maya"></div>
    <div class="boxer"></div>
    <script>
       $(document).ready(function(){
    function fetchData(query = '') {
        $.ajax({
            url: 'search_function.php',
            type: 'POST',
            data: {idx:query },
            success: function(data) {
                $('#maya').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error: ' + error);
            }
        });
    }

    fetchData();

    $('#data-box').on('input', function() {
        let value = $(this).val();
        fetchData(value);
    });
    $('#search').on('click', function() {
        let value = $('#data-box').val();
        fetchData(value);
    });
});
    </script>
</body>
</html>




