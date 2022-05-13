<?php

$suggestion = function ($tableName, $firstColumnName, $secondColumnName, $thirdColumnName,  $icon) use ($link) {

    $query = "SELECT * FROM `{$tableName}`";
    $queryResult = mysqli_query($link, $query);
    if (mysqli_num_rows($queryResult) > 0) {
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $firstColumn = $firstColumnName == '' ? '' : $row["{$firstColumnName}"];
            $secondColumn = $secondColumnName == '' ? '' : '- ' . $row["{$secondColumnName}"];
            $thirdColumn = $thirdColumnName == '' ? '' : '(' . $row["{$thirdColumnName}"] . ')';
            $iconName = $icon == '' ? '' : $icon;
?>
            <li class="mb-1 p-0">
                <button type="button">
                    <i class='<?php echo "{$iconName}" ?>'></i>
                    <?php echo "{$firstColumn} {$secondColumn} {$thirdColumn}" ?>
                    <input type="hidden" class='suggest-value' value='<?php echo $row["{$firstColumnName}"] ?>' />
                </button>
            </li>
    <?php }
    }
};

$showSuggestionBox = function ($tableName, $firstColumnName, $secondColumnName, $thirdColumnName, $icon) use ($suggestion) { ?>

    <div class='dropdown'>
        <ul class='dropdown-menu myActionDropDown' style="width:100%;max-height:150px;overflow:auto;">
            <?php $suggestion($tableName, $firstColumnName, $secondColumnName, $thirdColumnName, $icon) ?>
        </ul>
        <ul class='dropdown-menu myActionDropDown' style="width:100%;max-height:150px;overflow:auto;">
            <li style='text-align:center;'>No Result!</li>
        </ul>
    </div>
<?php };
