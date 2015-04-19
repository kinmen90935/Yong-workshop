<ul class="pagination">
<!--   <li>
  <a href="#" aria-label="Previous">
    <span aria-hidden="true">&laquo;</span>
  </a>
</li> -->
<?php
for ($i=1; $i <= $pg_counts ; $i++) {
?>
  <li data-page="<?= $i?>" class="<?php if ($i == $page) echo "active";?>"><a href="#"><?= $i?></a></li>
<?php
}
?>
<!--   <li>
  <a href="#" aria-label="Next">
    <span aria-hidden="true">&raquo;</span>
  </a>
</li> -->
</ul>