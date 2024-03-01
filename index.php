<?php

   $hotels = [

       [
           'name' => 'Hotel Belvedere',
           'description' => 'Hotel Belvedere Descrizione',
           'parking' => true,
           'vote' => 4,
           'distance_to_center' => 10.4
       ],
       [
           'name' => 'Hotel Futuro',
           'description' => 'Hotel Futuro Descrizione',
           'parking' => true,
           'vote' => 2,
           'distance_to_center' => 2
       ],
       [
           'name' => 'Hotel Rivamare',
           'description' => 'Hotel Rivamare Descrizione',
           'parking' => false,
           'vote' => 1,
           'distance_to_center' => 1
       ],
       [
           'name' => 'Hotel Bellavista',
           'description' => 'Hotel Bellavista Descrizione',
           'parking' => false,
           'vote' => 5,
           'distance_to_center' => 5.5
       ],
       [
           'name' => 'Hotel Milano',
           'description' => 'Hotel Milano Descrizione',
           'parking' => true,
           'vote' => 2,
           'distance_to_center' => 50
       ],

   ];

   $filteredHotels = $hotels;

    if (isset($_GET['seeParking']) && $_GET['seeParking'] == '1') {
       $filtHotelPark = [];

       foreach ($hotels as $el) {
        if ($el['parking']) {
            $filtHotelPark[] = $el;
        };
       };
       $filteredHotels = $filtHotelPark;
    };

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Search</title>

    <!-- Bootstarp 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="container">
        <div class="row m-auto my-5">
            <div class="col-8 m-auto ">
                <h1 class="h1 text-center text-white mb-5 ">Hotels review</h1>

                <form action="index.php" method="GET">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="seeParking" value="1"
                        <?php echo isset($_GET['seeParking']) && $_GET['seeParking'] == '1' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">With private parking</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>

                <table class="table table-dark table-hover table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">From center</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($filteredHotels as $hotel) : ?>
                        <tr>
                            <th scope="row">
                                <?= $hotel['name'] ?>
                            </th>
                            <td>
                                <?= $hotel['description'] ?>
                            </td>
                            <td>
                                <?= ($hotel['parking']) ? 'Si' : 'No' ?>  
                            </td>
                            <td>
                                <?= $hotel['vote'] ?>  
                            </td>
                            <td>
                                <?= "{$hotel['distance_to_center']} km" ?>  
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
   </div>

    <!-- Bootstarp 5.3.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>