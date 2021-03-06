
/*Vehicle*/
INSERT INTO Vehicle VALUES('1HGBH41JXMN109186','1997','camry','CE',200, 'purple','purple','2019-10-20');
INSERT INTO Vehicle VALUES('9ZGBH41JXMN109185','2000','corolla','XE',100, 'yellow','purple','2010-04-30');
INSERT INTO Vehicle VALUES('2BGBH41JXMN109185','2019','rav4','BE',10, 'yellow','purple','2019-04-30');
INSERT INTO Vehicle VALUES('3B22H41JXMN109185','2019','rav4','BE',10, 'yellow','purple','2019-02-30');

/*Used_Vehicle*/
INSERT INTO Used_Vehicle VALUES('1HGBH41JXMN109186',200,'steven','person','0002500.00','0001500.00');
INSERT INTO Used_Vehicle VALUES('9ZGBH41JXMN109185',200,'toyota motor','toyota motor','2000.00','2500.00');

/*New_Vehicle*/
INSERT INTO New_Vehicle VALUES('2BGBH41JXMN109185',10,2000.00);
INSERT INTO New_Vehicle VALUES('3B22H41JXMN109185',20,4000.00);

/* Sale */
INSERT INTO Sale VALUES('S-345', 1.2, 10000.00, 10.00, 10.00, '2018-03-01');
INSERT INTO Sale VALUES('S-117', 2.1, 6000.00, 100.00, 120.00, '2018-03-01');
INSERT INTO Sale VALUES('S-454', 3.12, 43400.00, 1330.00, 1110.00, '2018-03-01');

/* EMPLOYEE */
INSERT INTO Employee VALUES('E-069', 'George', 'Clooney', 14038675309);
INSERT INTO Employee VALUES('E-117', 'Charlize', 'Theron', 12521113456);
INSERT INTO Employee VALUES('E-666', 'Simon', 'Pegg', 1232116764);

/* WARRANTY */
INSERT INTO Warranty VALUES('P-123', 'Tom', 12, '2019-03-25', 100.00, 1000.00);
INSERT INTO Warranty VALUES('P-234', 'Jimmy', 12, '2019-03-24', 100.00, 1000.00);
INSERT INTO Warranty VALUES('P-456', 'Greg', 12, '2019-03-23', 100.00, 1000.00);
INSERT INTO Warranty VALUES('P-567', 'Chris', 12, '2019-03-22', 100.00, 1000.00);
INSERT INTO Warranty VALUES('P-678', 'Deb', 12, '2019-03-21', 100.00, 1000.00);

/* ITEMS COVERED */
INSERT INTO items_covered VALUES('P-123', 'Windshield');
INSERT INTO items_covered VALUES('P-234', 'Left Tire');
INSERT INTO items_covered VALUES('P-345', 'Muffler');
INSERT INTO items_covered VALUES('P-456', 'Right Passenger Set');
INSERT INTO items_covered VALUES('P-567', 'N/A');

/* CUSTOMER */
insert into Customer values('C-000', 'Rylan', 'Bueckert', '1997-09-18', 'Male', 1230, '3 Ave', 'La Crete', 'Alberta', 'T0H2H0', '7809283127');
insert into Customer values('C-001', 'Ryan', 'Wenman', '1940-02-14', 'Male', 30445, '66 Street', 'Airdrie', 'Alberta', 'T4A6G9', '6664206969');
insert into Customer values('C-002', 'Tyler', 'Siwy', '1992-09-02', 'Male', 420, '69 Street', 'Calgary', 'Alberta', 'T5P4H0', '457285347');
/* relations ******************************************************/

/* SALE_CUSTOMER */
INSERT INTO Sale_Customer VALUES('C-000', 'S-345');
INSERT INTO Sale_Customer VALUES('C-002', 'S-117');
INSERT INTO Sale_Customer VALUES('C-002', 'S-454');

/* SALE_EMPLOYEE */
INSERT INTO Sale_Employee VALUES('E-069', 'S-345');
INSERT INTO Sale_Employee VALUES('E-666', 'S-117');
INSERT INTO Sale_Employee VALUES('E-117', 'S-454');

/* SALE_VEHICLE */
INSERT INTO Sale_Vehicle VALUES('1HGBH41JXMN109186', 'S-345');
INSERT INTO Sale_Vehicle VALUES('9ZGBH41JXMN109185', 'S-117');
INSERT INTO Sale_Vehicle VALUES('3B22H41JXMN109185', 'S-454');

/* Vehicle_Warranty */
INSERT INTO Vehicle_Warranty VALUES('P-123', '1HGBH41JXMN109186');
INSERT INTO Vehicle_Warranty VALUES('P-234', '9ZGBH41JXMN109185');
INSERT INTO Vehicle_Warranty VALUES('P-456', '2BGBH41JXMN109185');
/* weak entities ******************************************************/

/* REPAIRS */
INSERT INTO Repairs VALUES('9ZGBH41JXMN1091855', 'flat rear left tire', 100, 98.76);
INSERT INTO Repairs VALUES('1HGBH41JXMN109186', 'flat rear left tire', 100, 98.76);

/* payments */
INSERT INTO Payments VALUES('S-345','n-123','2019-10-10',15,2000,723854345);
INSERT INTO Payments VALUES('S-345','n-223','2019-11-11',15,2000,723854345);
INSERT INTO Payments VALUES('S-345','n-323','2019-12-12',15,2000,723854345);

/*Employment_History*/
INSERT INTO Employment_History VALUES('C-000','2019-10-10','apple-picker','joey','joeys only','4039283433',21,'alberta','airdrie','T4B1W2');
INSERT INTO Employment_History VALUES('C-002','2019-09-10','apple-dropper','joey','joeys only','4039283433',21,'alberta','airdrie','T4B1W2');
