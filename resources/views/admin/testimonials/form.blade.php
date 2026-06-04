<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Test RateYo</title>

  <!-- RateYo CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/3.2.0/jquery.rateyo.min.css">

</head>
<body>

  <form action="" method="POST">
    @csrf

    <label for="rating" class="font-medium text-gray-700">Rating</label>
    <div id="rateYo" class="mb-3"></div>
    <input type="hidden" name="rating" id="rating" value="">

    <button type="submit" class="admin-btn-success">Save</button>
  </form>

  <!-- jQuery + RateYo -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/3.2.0/jquery.rateyo.min.js"></script>

  <script>
    $(function () {
        $("#rateYo").rateYo({
            rating: $("#rating").val() || 0,
            halfStar: true,
            starWidth: "30px",
            ratedFill: "#f39c12",
            normalFill: "#dcdcdc",
            onSet: function (rating, rateYoInstance) {
                $("#rating").val(rating);
            }
        });
    });
  </script>
</body>
</html>
