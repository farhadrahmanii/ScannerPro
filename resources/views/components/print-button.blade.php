<button type="button" id="print-button-{{ $row->id }}">Print Slip</button>

<script>
    document.getElementById('print-button-{{ $row->id }}').addEventListener('click', function () {
        window.location.href = '/backend/cash/print-slip/{{ $row->id }}';
    });
</script>