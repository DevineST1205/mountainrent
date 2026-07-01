alert("SCRIPT KEBACA");
function lanjut(){

    let form = document.getElementById("formPenyewa");

    if(!form.checkValidity()){
        form.reportValidity();
        return;
    }

    document.getElementById("alatSection").style.display = "block";
    form.style.display = "none";
}

function tambahBaris(){

    let tabel = document.getElementById("tabelPilih");

    let barisBaru = document.createElement("tr");

    barisBaru.innerHTML = `
        <td>
            <select class="alat">
                ${document.querySelector(".alat").innerHTML}
            </select>
        </td>

        <td>
            <select class="lama">
                <option value="1">1 Malam</option>
                <option value="2">2 Malam</option>
                <option value="3">3 Malam</option>
            </select>
        </td>

        <td>
            <input type="number" class="jumlah" min="1" value="1">
        </td>
    `;
    tabel.appendChild(barisBaru);
}


function hitungTotal(){
console.log("HITUNG JALAN");

    let totalBarang = 0;
    let totalHarga = 0;

    let rows = document.querySelectorAll("#tabelPilih tr");

    rows.forEach(function(row, index){

        if(index === 0) return;

        let alat = row.querySelector(".alat");
        let lama = row.querySelector(".lama");
        let jumlah = row.querySelector(".jumlah");

        if(!alat || alat.value === "") return;

        let option = alat.options[alat.selectedIndex];

        let qty = parseInt(jumlah.value) || 0;

        let harga = 0;

        if(lama.value == "1"){
            harga = parseInt(option.dataset.h1);
        } else if(lama.value == "2"){
            harga = parseInt(option.dataset.h2);
        } else {
            harga = parseInt(option.dataset.h3);
        }

        // 🔥 INI YANG KAMU LUPA
        totalBarang += qty;
        totalHarga += harga * qty;
    });

    // simpan untuk kirim ke PHP
    totalBarangAsli = totalBarang;
    totalHargaAsli = totalHarga;

    document.getElementById("totalBarang").innerText = totalBarang;
    document.getElementById("totalHarga").innerText =
        totalHarga.toLocaleString("id-ID");
}

document.addEventListener("input", function(e){
    if(
        e.target.classList.contains("alat") ||
        e.target.classList.contains("lama") ||
        e.target.classList.contains("jumlah")
    ){
        hitungTotal();
    }
});

function selesaiSewa(){

    let nama = document.querySelector("input[name='nama']").value;
    let hp = document.querySelector("input[name='hp']").value;
    let jaminan = document.querySelector("select[name='jaminan']").value;
    let tgl_sewa = document.querySelector("input[name='tgl_sewa']").value;
    let tgl_kembali = document.querySelector("input[name='tgl_kembali']").value;

    if(nama === "" || hp === "" || jaminan === "" || tgl_sewa === "" || tgl_kembali === ""){
        alert("Data penyewa belum lengkap!");
        return;
    }

    let detailAlat = "";

document.querySelectorAll("#tabelPilih tr").forEach((row, index) => {
    if(index === 0) return; // lewati header

    let alat = row.querySelector(".alat");
    let jumlah = row.querySelector(".jumlah");

    if(alat && alat.value !== ""){
        detailAlat += alat.value + " (" + jumlah.value + " buah), ";
    }
});

    // kirim ke PHP (tanpa ubah UI kamu)
    fetch("simpan.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body:
            "nama=" + nama +
            "&hp=" + hp +
            "&jaminan=" + jaminan +
            "&tgl_sewa=" + tgl_sewa +
            "&tgl_kembali=" + tgl_kembali +
            "&total_barang=" + totalBarangAsli+
            "&total_harga=" + totalHargaAsli+
            "&detail_alat=" + encodeURIComponent(detailAlat)
    })
    .then(res => res.text())
  .then(data => {

    let box = document.createElement("div");
    box.innerHTML = `
        <div style="
            position:fixed;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            background:#000;
            color:white;
            padding:30px;
            font-size:20px;
            z-index:9999;
            text-align:center;
            border-radius:10px;
        ">
            ✔ SEWA BERHASIL!<br><br>
            <button onclick="window.location.href='index.php'">
                OK
            </button>
        </div>
    `;

    document.body.appendChild(box);
});

}