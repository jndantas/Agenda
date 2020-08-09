<script>
    function handleDelete(id){
        var form = document.getElementById('deleteForm')
        form.action = '/customer/' + id
        $('#deleteModal').modal('show')
    }
</script>
