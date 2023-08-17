CREATE DATABASE `HBMS`;
USE `HBMS`;

CREATE TABLE `staff` (
    `staffID` int NOT NULL AUTO_INCREMENT,
    `staffName` varchar(60) NOT NULL,
    `staffPosition` varchar(60) NOT NULL,
    `staffPass` varchar(12) NOT NULL,
    PRIMARY KEY (`staffID`)
);

CREATE TABLE `room` (
    `roomID` int NOT NULL AUTO_INCREMENT,
    `roomType` varchar(30) NOT NULL,
    `roomPrice` double(5,2) NOT NULL,
    PRIMARY KEY (`roomID`) 
);

CREATE TABLE `booking` (
    `bookingID` varchar(9) NOT NULL,
    `roomID` int(11) NOT NULL,
    `customerName` varchar(60) NOT NULL,
    `phoneno` varchar(11) NOT NULL,
    `checkinDate` date NOT NULL,
    `checkoutDate` date NOT NULL,
    `days` int(2) NOT NULL,
    `totalPrice` double(5,2) NOT NULL,
    PRIMARY KEY (`bookingID`) 
);