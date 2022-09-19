$(document).ready(function() {
    $.ajax({
            type: 'POST',
            url: './src/loadCode.php'
        })
        .done(function(code) {
            $('#codigo').html(code)
        })
        .fail(function() {
            alert('Hubo un error al cargar el lectura')
        })
    
    $('#codigo').on('change', function() {
        var id = $('#codigo').val()
        $.ajax({
            type: 'POST',
            url: './src/loadTitular.php',
            data: { 'id': id }
        })
    
        .done(function(id) {
            $('#titular').html(id)
        })
        .fail(function() {
            alert('Hubo un error al cargar el titular')
        })
    
    
    })
    $('#codigo').on('change', function() {
        var id = $('#codigo').val()
        $.ajax({
            type: 'POST',
            url: './src/loadDireccion.php',
            data: { 'id': id }
        })

        .done(function(id) {
                $('#direccion').html(id)
            })
            .fail(function() {
                alert('Hubo un error al cargar la direccion')
            })


    })
    $('#codigo').on('change', function() {
        var id = $('#codigo').val()
        $.ajax({
                type: 'POST',
                url: './src/loadMz.php',
                data: { 'id': id }
            })
            .done(function(id) {
                $('#mz').html(id)
            })
            .fail(function() {
                alert('Hubo un error al cargar la mz')

            })

    })
    $('#codigo').on('change', function() {
        var id = $('#codigo').val()
        $.ajax({
                type: 'POST',
                url: './src/loadFecha.php',
                data: { 'id': id }
            })
            .done(function(id) {
                $('#fecha').html(id)
            })
            .fail(function() {
                alert('Hubo un error al cargar la fecha')

            })

    })
    $('#codigo').on('change', function() {
        var id = $('#codigo').val()
        $.ajax({
                type: 'POST',
                url: './src/loadVilla.php',
                data: { 'id': id }
            })
            .done(function(id) {
                $('#villa').html(id)
            })
            .fail(function() {
                alert('Hubo un error al cargar la villa')

            })

    })

    $('#codigo').on('change', function() {
        var id = $('#codigo').val()
        $.ajax({
                type: 'POST',
                url: './src/loadLocalizacion.php',
                data: { 'id': id }
            })
            .done(function(id) {
                $('#localizacion').html(id)
            })
            .fail(function() {
                alert('Hubo un error al cargar la localizacion')

            })

    })


})