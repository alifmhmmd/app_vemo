###################
VEMO
###################

Vemo adalah singkatan dari vehicle monitoring. Aplikasi vemo digunakan untuk mencatat dan memonitoring data kendaraan disuatu perusahaan. Terdapat dua user yang dapat login yakni admin dan atasan. Admin bertindak sebagai penginput pemesanan kendaraan dan atasan bertindak pihak yang menyetujui pemesanan kendaraan yang dilakukan.

*******************
Syarat Kebutuhan Aplikasi
*******************
1. Menggunakan bahasa pemrograman PHP
2. Menggunakan PHP versi 7.4.22
3. Mengunakan Framework Codeigniter
4. Menggunakan Codeigniter versi 3.1.13
5. Menggunakan Database MySQL
6. Menggunakan XAMPP 5.1.1

**************************
Panduan Aplikasi
**************************
1. User Terdiri dari Admin dan Atasan
2. Menu terdiri atas: Menu Login, Menu Dashboard, Menu Data Kendaraan, Menu Data Pemesanan, Menu Persetujuan, dan Menu Kelola Akun.
3. Admin dapat mengakses menu login, menu dashboard, menu data kendaraan, menu data pemesanan, dan menu kelola akun.
4. Atasan hanya dapat mengakses menu persetujuan.
5. Sebelum menginputkan pemesanan, admin terlebih dahulu mengakses menu kendaaran untuk menginputkan data kendaraan yang dimiliki.
6. Selanjutnya admin dapat melakukan input data pemesanan kendaraan dengan mengakses menu data pemesanan.
7. Setiap pemesanan yang diinputkan admin, akan di set status pemesanan menjadi menunggu persetujuan
8. Selanjutnyya setiap atasan dapat melakukan peretujuan pemesanan kendaraan dengan mengakses menu persetujuan.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <https://codeigniter.com/userguide3/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Contributing Guide <https://github.com/bcit-ci/CodeIgniter/blob/develop/contributing.md>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.
