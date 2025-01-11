<?php
$totalStorageLimit = getFileSizeLimit();
$totalStorageLimitInBytes = formatFileSizeFlexible($totalStorageLimit, 'KB', 'B');
$progress = ($totalOccupiedStorage / $totalStorageLimitInBytes) * 100;

?>


<p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">
    {{ formatFileSize($totalOccupiedStorage) }}
    <span class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">1 GB</span>
</p>
<progress class="progress progress1" max="100" value="{{ $progress }}"></progress>