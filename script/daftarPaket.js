

function removeCurrencyFormat(value) {
    return parseInt(value.replace(/[^0-9,-]+/g, "").replace(',', '.'));
}

function hitungTotal() {
    let total = 0;
    const penginapan = document.getElementById('penginapan').checked ? 1000000: 0;
    const transportasi = document.getElementById('transportasi').checked ? 1200000 : 0;
    const service = document.getElementById('service').checked ? 500000: 0;

    total = penginapan + transportasi + service;
    document.getElementById('hPaket').value = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(total);

    let waktuPesanan = document.getElementById('waktuPesanan') ? parseInt(document.getElementById('waktuPesanan').value) : 1;
    let jumlahPeserta = document.getElementById('jumlahPeserta') ? parseInt(document.getElementById('jumlahPeserta').value) : 1;
    let jumlahTagihan = total * waktuPesanan * jumlahPeserta;
    document.getElementById('jTagihan').value = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(jumlahTagihan);
}

function resetForm() {
    document.getElementById('pesananForm').reset();
    document.getElementById('hPaket').value = '';
    document.getElementById('jTagihan').value = '';
}

// function prepareFormData(event) {
//     event.preventDefault();
//     let hargaPaket = removeCurrencyFormat(document.getElementById('hPaket').value);
//     let jumlahTagihan = removeCurrencyFormat(document.getElementById('jTagihan').value);

//     document.getElementById('hPaket').value = hargaPaket;
//     document.getElementById('jTagihan').value = jumlahTagihan;

//     document.getElementById('pesananForm').submit();
// }


