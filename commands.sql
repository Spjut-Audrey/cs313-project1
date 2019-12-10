sql

CREATE TABLE cars (
    cars_id     integer PRIMARY KEY DEFAULT nextval('serial'),
    cars_make    varchar(50) NOT NULL,
    cars_miles   integer NOT NULL
)

CREATE TABLE mileCheck (
    mile_id     integer PRIMARY KEY DEFAULT nextval('serial'),
    mile_number integer NOT NULL,
    mile_desc   varchar(250)
)

-- source https://www.campanellas.com/car-tips/auto-repair-timeline--at-what-mileage-does-your-vehicle-need-
INSERT INTO mileCheck (mile_id, mile_number, mile_desc) 
VALUES 
       (1, 3000, "Oil Change"),
       (2, 30000, "Tune Up Service"),
       (3, 50000, "Check Shocks & Struts"),
       (4, 60000, "Replace Timing Belts"),
       (5, 70000, "Check Pumps"),
       (6, 80000, "Replace Battery"),
       (7, 90000, "Tune Up Service"),
       (8, 100000, "Transmission & Engine Evaluation");