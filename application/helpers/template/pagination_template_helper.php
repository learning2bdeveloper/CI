<?php

function pagination_links($currentPage, $totalPages)
{ ?>
    <!-- Pagination links -->

    <nav aria-label="Page navigation example" id="navbottom">
        <ul class="pagination justify-content-center"> <!-- Added justify-content-center class -->
            <?php if ($currentPage > 1) { ?>
                <li class="page-item">
                    <button class="page-link pagination_link" aria-label="First" data-pass-value="<?= 1; ?>">
                        First
                    </button>
                </li>
            <?php } ?>

            <?php if ($currentPage > 1) { ?>
                <li class="page-item">
                    <button class="page-link pagination_link" aria-label="Previous" data-pass-value="<?= $currentPage - 1; ?>">
                        <span aria-hidden="true">&laquo;</span>
                    </button>
                </li>
            <?php } ?>

            <!-- <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <li class="page-item">
                <button class="page-link pagination_link" data-pass-value="<?= $i; ?>"><?= $i; ?></button>
            </li>
        <?php } ?> -->

            <?php if ($currentPage < $totalPages) { ?>
                <li class="page-item">
                    <button class="page-link pagination_link" aria-label="Next" data-pass-value="<?= $currentPage + 1; ?>">
                        <span aria-hidden="true">&raquo;</span>
                    </button>
                </li>
            <?php } ?>

            <?php if ($currentPage < $totalPages) { ?>
                <li class="page-item">
                    <button class="page-link pagination_link" aria-label="Last" data-pass-value="<?= $totalPages; ?>">
                        Last
                    </button>
                </li>
            <?php } ?>
        </ul>

    </nav>
    <p class="text-center mt-3" style="width: fit-content;"><?= "Page: " . $currentPage . " of " . $totalPages; ?></p> <!-- Added pt-3 class for top padding -->
<?php } ?>