# CMO_tech_test

### Specifications

• Download and install WAMP server, ensuring you install MariaDB v10.3 (remove or disable MySQL) and PHP v7.4. Alternatively use your preferred stack, but ensure you have PHP7.4 and MariaDB.
• Create a VAT calculator that shows a history of calculations requested that can be exported as a CSV file.
• For user provided monetary value V and VAT percentage rate R, calculate and display both sets of calculations:
o Where V is treated as being ex VAT show the original value V, the value V with VAT added and the amount of VAT calculated at the rate R.
o Where V is treated as being inc VAT show the original value V, the value V with VAT subtracted and the amount of VAT calculated at the rate R.
• The results from each requested set of calculations should be stored, and displayed on screen as a table of historical calculations.
• The history should be able to be cleared and exportable to a CSV file.

### Results

Successful implementation of all required functionality

### Changes to the specifications:

'V' is replaced by 'excVat'
'R', 'rate' is set and fixed at 20%

#### Instructions

In MariaDB shell, create table historical_calcs with the following command:

create table historical_calcs(id int auto_increment, date datetime default current_timestamp, excVat int, incVat int, PRIMARY KEY(id));

##### Location of project

The project resides in a folder in wamp64/www/ called vat_calc. Files for the project will be served from within here using [localhost](http://localhost/vat_calc/VAT_calc.php).

#### Known bugs / issues:

There may be redundant or duplicated code. The config file was added towards the 3rd quarter of the project.
Most console.logs() or var_dumps() have been removed. Some may still remain.
Important markers in sections of code have been commented / documented.
exportDBtoCSV.php registers an error in the editor but functions correctly.
Relative paths to files and folders may be incorrect when cloning this repository and may need a prefix: '/' or a full path

##### Time: 

installation of required server and php version -> 2hrs; design of programme -> 1.5hrs; coding the project -> 4.5hrs; styling -> 20 mins (max)
