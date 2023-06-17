var left = document.getElementById("left");
var right = document.getElementById("right");
var month = document.getElementById("month");
var year = document.getElementById("year");
const monthofYear = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]; //list nama bulan

function changeMonthLeft(){
    var monthValue = month.innerHTML;
    var monthIndex = monthofYear.indexOf(monthValue);
    var monthIndexLeft = monthIndex - 1; //kiri harus dikurangi
    if (monthIndexLeft < 0){
        monthIndexLeft = 11; //balek ke desember 12 bulan
        year.innerHTML = " " + (parseInt(year.innerHTML) - 1); //ngambil tahun lalu minus 1
    }
    month.innerHTML = monthofYear[monthIndexLeft];
    DynamicCalender();
}

function changeMonthRight(){
    var monthValue = month.innerHTML;
    var monthIndex = monthofYear.indexOf(monthValue);
    var monthIndexRight = monthIndex + 1;
    if (monthIndexRight > 11){
        monthIndexRight = 0;
        year.innerHTML = " " + (parseInt(year.innerHTML) + 1);
    }
    month.innerHTML = monthofYear[monthIndexRight];
    DynamicCalender();
}

function getEventsByDay(events, day) { //ambil event perhari
    var filteredEvents = events.filter(function(event) { //seperti fungsi search event yang mau di tampilin
      var eventDay = new Date(event.tgl_mulai).getDate();// string dari json.php di ubah jadi tanggal, lalu ambil harinya
      return eventDay === day;
    });
    return filteredEvents;
 }

function filterEventsByMonth(events, targetMonth) { // sama seperti event day 
    return events.filter(function(event) {
      var eventDate = new Date(event.tgl_mulai);
      var eventMonth = eventDate.getMonth() + 1; //untuk menyesuaikan eventsnya
      return eventMonth === targetMonth;
    });
  }

function DynamicCalender(){
    var monthValue = month.innerHTML;//agar month di februari.php dynamis
    var monthIndex = monthofYear.indexOf(monthValue); //ambil index list bulan diatas
    var yearValue = year.innerHTML; //agar year di februari.php

    var dateofcal = new Date(yearValue, monthIndex);
    var firstDay = dateofcal.getDay(); // ambil hari pertama itu apa ? apakah senin / selasa returnnya angka
    var totalDay = new Date(yearValue, monthIndex + 1, 0).getDate();  // dalam bulan  itu ada berapa harinya 
    var calender = document.getElementById("calender");// ambil tabel kalender;
    // clear calender
    calender.innerHTML = ""; // membersihkan kalender awal
    //get ajax from json.php
    var xhr = new XMLHttpRequest();  
    xhr.open("GET", "json.php", true); // ambil data dari  json.php
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) { // kalo sukses maka lakukan ini
        var data = JSON.parse(xhr.responseText);   //  ambil data dalam json lalu masukan ke variabel data
        data = filterEventsByMonth(data, monthIndex + 1);  //  ambil data dalam bulan tertentu
        console.log(data);
        
        //create dynamic caleder
        let day = 0;
        let date = 0;
        for (let i = 0; i < 6; i++){
            if (date >= totalDay){
                break; 
            } 
            const row = document.createElement("tr"); // create row hari
            for (let j = 0; j < 7; j++) {     // looping 7 kali karena 1 minggu 7 hari
                const cell = document.createElement("td");  // buat kolom hari
                if (day == firstDay){   // jika kalender nya sudah sama dengan letak harinya maka 
                    if (date >= totalDay){ // jika hari sudah melampui jumlah hari dalam bulan maka pass
                    } else {  // kalo tidak
                        date += 1; // hari ditambah1 1
                        cell.innerText = date; // tulis  hari dalam cell / kolomnya
                        var todayEvent = getEventsByDay(data, date);  // ambil event dari data
                        if (todayEvent.length != 0){  // jika ada event              
                            for (var event of todayEvent) { // maka buatlah paragraph untuk event
                                yearevent = event.tgl_mulai.substring(0,4); // ambil tahunnya terlebbih dahulu
                                console.log(yearevent);
                                console.log(yearValue.substring(1,5));
                                if (yearevent === yearValue.substring(1,5)){ // cek apakah tahun sudah sama
                                    var paragraph = document.createElement("p"); // jika sudah buat tulisan even 
                                    paragraph.innerText = event.keterangan;
                                    cell.appendChild(paragraph); // masukin ke cellnya
                                }
                              } 
                        }
                    }
                } else {
                    day += 1; // jika  harinya belum sama dengan letak harinya maka tambah 1
                }
                row.appendChild(cell); // masukin ke rownya
            }
            calender.appendChild(row); // masukin rownya ke tabel
        } 
        }
    }
    // check ajax
    xhr.send(); // kirim ke ajax
}

left.addEventListener("click", changeMonthLeft);
right.addEventListener("click", changeMonthRight);
DynamicCalender();