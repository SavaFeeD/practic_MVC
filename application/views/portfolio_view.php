<section class="container pt-5">
    <h1>Портфолио</h1>
    <p>
    <table class="table table-dark">
        <thead>
            <tr><td>Год</td><td>Проект</td><td>Описание</td></tr>
        </thead>
        <tbody>
            <?php
            foreach($data as $row)
            {
                echo '<tr><td>'.$row['Year'].'</td><td><a href="'.$row['Site'].'">'.$row['Site'].'<a/></td><td>'.$row['Description'].'</td></tr>';
            }
            ?>
        </tbody>
    </table>
    </p>
</section>

<style>
thead{
    background: #202327;
}
</style>