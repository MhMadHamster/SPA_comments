<?php

  require_once "connect.php";

  function tree($node, $posts, $connection) {

    $sql_childs = "SELECT * FROM `$posts` WHERE $posts.parent = '$node'";

    $result_childs = $connection->query($sql_childs);

    if ($result_childs->num_rows > 0) {
      while ($row_childs = $result_childs->fetch_assoc()) {
        echo "<div class='media' id='" . $row_childs["pid"] . "'>";
        echo "<div class='media-left'><p class='text-muted'>#" . $row_childs["pid"] . "</p></div>";
        echo "<div class='media-body'>
                <h4 class='media-heading'>" . $row_childs["author"] . "</h4>
                <p> " . $row_childs["post"] . "</p>
                <div class='comment-buttons'>
                  <a href='' class='js-reply'>Reply <span class='glyphicon glyphicon-retweet' aria-hidden='true'></span></a>
                  <a href='' class='js-remove'>Remove <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>
                </div>";
        tree($row_childs["pid"], $posts, $connection);
        echo "</div>";
        echo "</div>";
      }
    } else {
      return NULL;
    }
  }

  $sql = "SELECT * FROM `$posts` WHERE $posts.parent IS NULL";

  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
    echo "<ul class='media-list'>";
    while($row = $result->fetch_assoc()) {
        echo "<li class='media' id='" . $row["pid"] . "'>";
        echo "<div class='media-left'><p class='text-muted'>#" . $row["pid"] . "</p></div>";
        echo "<div class='media-body'>";
        echo "<h4 class='media-heading'>" . $row["author"] . "</h4>";
        echo "<p>" . $row["post"] . "</p>";
        echo "<div class='comment-buttons'>
                <a href='' class='js-reply'>Reply <span class='glyphicon glyphicon-retweet' aria-hidden='true'></span></a>
                <a href='' class='js-remove'>Remove <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>
              </div>";

        tree($row["pid"], $posts, $connection);

        echo "</div>";
        echo "</li>";
    }
    echo "</ul>";
  } else {
    echo "<ul class='media-list'>
          </ul>";
  }

?>