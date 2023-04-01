<h1>Sales List</h1>
<hr>
</div>
<div id="subcontent">
    <?php
    //The switch statement is used to check the value of the $action variable and execute the corresponding code block.
    //comment
      switch($action){
                case 'sales':
                    require_once 'sales-module/sales.php';
                break;
                default:
                    require_once 'sales-module/sales.php';
                break;
            }
            ?>
            </div>
