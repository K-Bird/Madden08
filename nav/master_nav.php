<?php 

if ($NavLevel === 'top') { $directoryPath = ''; }
if ($NavLevel === '2nd') { $directoryPath = '../'; }

?>
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                Madden 2008
            </a>
        </li>
        <li>
            <a href="<?= $directoryPath ?>index.php">Home<span class="glyphicon glyphicon-home"></span></a>
        </li>
        <li>
            <a href="<?= $directoryPath ?>franchises/madden_franchise_mgt.php" style="text-indent: 1em"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;Franchise Management</a>
        </li>
        <li>
            <a href="<?= $directoryPath ?>franchises/madden_view_franchise.php" style="text-indent: 1em"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;View Franchise</a>
        </li>
        <li>
            <a href="<?= $directoryPath ?>players.php" style="text-indent: 1em"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;Players</a>
        </li>
        <li>
            <a href="<?= $directoryPath ?>achievements.php" style="text-indent: 1em"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;Achievements</a>
        </li>
        <li>
            <a href="<?= $directoryPath ?>statistics.php" style="text-indent: 1em"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;Statistics</a>
        </li>
    </ul>
</div>

