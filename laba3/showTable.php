<?php
$titleList = array("Name", "Gender", "Seasons");
$formDataLines = file("./formDataList.txt");
foreach ($formDataLines as $line) {
  $oneUserData = explode("-|-", $line);
  $arrayTechnologieList = array();

  $firstTechnologieInList = 4;
  for ($index = $firstTechnologieInList; $index < count($oneUserData); $index++) {
    array_push($arrayTechnologieList, $oneUserData[$index]);
  }
  $oneUserData = array_diff($oneUserData, $arrayTechnologieList);
  array_push($oneUserData, $arrayTechnologieList);
  $oneUserData = array_values($oneUserData);
  $AssociativeArray[] = $oneUserData;
}
// Переделываю в ассоциативный массив.
for ($array = 0; $array < count($AssociativeArray); $array++) {
  for ($arrayIndex = 0; $arrayIndex < count($AssociativeArray); $arrayIndex++) {
    $AssociativeArray[$array]['name'] = $AssociativeArray[$array][0];
    $AssociativeArray[$array]['gender'] = $AssociativeArray[$array][1];
    $AssociativeArray[$array]['seasons'] = $AssociativeArray[$array][2];
    $AssociativeArray[$array]['image'] = $AssociativeArray[$array][3];
    $AssociativeArray[$array]['languages'] = $AssociativeArray[$array][4];
  }
  unset($AssociativeArray[$array][0]);
  unset($AssociativeArray[$array][1]);
  unset($AssociativeArray[$array][2]);
  unset($AssociativeArray[$array][3]);
  unset($AssociativeArray[$array][4]);
}
?>

<?php
// Получение отдельных массивов имен, пола, времени года.
foreach ($AssociativeArray as $key => $arr) {
  $data_name[$key] = $arr['name'];
  $data_gender[$key] = $arr['gender'];
  $data_seasons[$key] = $arr['seasons'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Вывод таблицы</title>
  <link rel="stylesheet" href="main.css">
</head>

<body>
  <div class="table-block">
    <table>
      <thead>
        <tr>
          <?php
          if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
          } else {
            $sort = "ASC";
          }

          if (isset($_GET['title'])) {
            $title = $_GET['title'];
          } else {
            $title = "Name";
          }

          if ($sort == 'ASC' && $title == 'Name') {
            array_multisort($data_name, SORT_ASC, $AssociativeArray);
          }
          if ($sort == 'DESC' && $title == 'Name') {
            array_multisort($data_name, SORT_DESC, $AssociativeArray);
          }
          if ($sort == 'ASC' && $title == 'Gender') {
            array_multisort($data_gender, SORT_ASC, $AssociativeArray);
          }
          if ($sort == 'DESC' && $title == 'Gender') {
            array_multisort($data_gender, SORT_DESC, $AssociativeArray);
          }
          if ($sort == 'ASC' && $title == 'Seasons') {
            array_multisort($data_seasons, SORT_ASC, $AssociativeArray);
          }
          if ($sort == 'DESC' && $title == 'Seasons') {
            array_multisort($data_seasons, SORT_DESC, $AssociativeArray);
          }
          $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
          ?>
          <?php
          foreach ($titleList as $titleItem) {
            $_GET['title'] == $titleItem ? $color = "#6e00ff2e" : $color = "#ffffff";
            echo "<th style=background-color:$color><a href=?title=$titleItem&sort=$sort>$titleItem</a></th>";
          }
          ?>
          <th>Languages</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($AssociativeArray as $array) {
          echo "<tr>";
          echo "<td>";
          echo "<span>" . $array['name'] . "</span>";
          echo "</td>";
          echo "<td>";
          echo "<span>" . $array['gender'] . "</span>";
          echo "</td>";
          echo "<td>";
          echo "<span>" . $array['seasons'] . "</span>";
          echo "</td>";
          echo "<td>";
          echo "<ul class='technologies__list'>";
          foreach ($array['languages'] as $language) {
            echo "<li class='technologies__item'>";
            echo "<span>$language</span>";
            echo "</li>";
          }
          echo "</ul>";
          echo "</td>";
          echo "<td>";
          echo "<div>";
          echo "<img src=" . $array['image'] . " alt='Картинка' width='130' />";
          echo "</div>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>

<style>
  body {
    font-size: 15px;
  }

  a {
    text-decoration: none;
    color: #000000;
  }

  table,
  td,
  tr,
  th {
    border: 2px solid #000000;
    border-collapse: collapse;
    padding: 10px;
    text-align: center;
    vertical-align: middle;
  }

  ul,
  li {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .table-block {
    margin: 20px;
    display: flex;
    justify-content: space-evenly;
  }

  img {
    display: block;
    height: auto;
    max-width: 100%;
    border-radius: 5px;
  }
</style>