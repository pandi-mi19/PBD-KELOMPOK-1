# PBD-KELOMPOK-1
ini project kelompok 1

Nama Kelompok :
1. Pandi Kurniawan
2. Ikhsan Nur Fajri
3. Pingko Sony Pratama
4. Muslim Ma'arif
5. Nurul Khusnia
6. Riski Safitri Handayani

Description:

*Arsitektur Sistem Basis Data

Arsitektur aplikasi basis data menjelaskan rancangan dasar aplikasi basis data yang akan dibangun. Arsitektur basis data menggambarkan diagram interaksi antara komponen-komponen penyusun sistem manajemen basis data. Komponenkomponen tersebut meliputi perangkat hardware, software, jaringan komputer, dan pengguna. Berdasarkan arsitekturnya aplikasi sistem manajemen basis data (SMBD) dibedakan menjadi beberapa macam antara lain adalah sebagai berikut: 
 
 
- SMBD terpusat (CDBMS: Centralized Database Management System). 
  Pada sistem ini semua proses utama dan fungsi sistem manajemen basis data seperti user application programs dan user interface programs berada secara terpusat di satu komputer berkecepatan dan kapasitas tinggi (main frame). Pengguna mengakses basis data menggunakan terminal komputer. 

- SMBD terdistribusi (DDBMS: Distribution Database Management System) 
  Pada sistem ini data disimpan pada beberapa tempat (site), setiap tempat diatur dengan suatu DBMS yang dapat berjalan secara independent. Perangkat lunak dalam sistem ini akan mengatur pendistribusian data secara transparan. 
 
- SMBD parallel (PDBMS: Parallel Database Management System) 
  Sistem manajemen basis data ini menggunakan beberapa prosesor dan disk yang dirancang untuk dijalankan secara paralel dan simultan. Sistem ini digunakan untuk memperbaiki kinerja dari DBMS 
 
Dari tiga ragam jenis SMBD diatas terdapat beberapa model arsitektur aplikasi SMBD. Perkembangan Arsitektur SMBD cukup pesat dan cepat dengan mengikuti trend yang sejalan dengan kemajuan arsitektur sistem komputer serta teknologi informasi dan komunikasi. 
 
*Sistem Basis Data Terpusat (CDBMS) 

Pada sistem ini semua proses utama dan fungsi sistem manajemen basis data seperti user application programs dan user interface programs berada secara terpusat di satu komputer berkecepatan dan kapasitas tinggi (main frame). Pengguna mengakses basis data menggunakan terminal komputer. Pada arsitektur ini digunakan komputer main frame yg menyediakan semua proses utama seperti fungsinya pada DBMS (user application programs & user interface programs). Bentuk arsitektur terpusat ini menggambarkan pengaksesan terminal-terminal komputer (client) pada komputer server, berupa display informasi dan kontrol saja, karena pada terminal komputer tidak memungkinkan memiliki resource yang lebih. 
 
Seiring perkembangan teknologi dan turunnya harga hardware, banyak terminal user digantikan dengan PC, akan tetapi DBMS masih ditempatkan terpusat (Application program execution & user interface processing ditempatkan pada satu mesin). Gambar 5.1. menjelaskan bagaimana arsitektur Centralized Database manajemen Sistem (CDBMS) dibangun. 
