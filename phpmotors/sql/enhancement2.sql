-- Query 1 --
INSERT INTO clients (
        clientFirstname,
        clientLastname,
        clientEmail,
        clientPassword,
        comment
    )
VALUES (
        'Tony',
        'Stark',
        'tony@starkent.com',
        'Iam1ronM@n',
        'I am the real Ironman'
    );
-- Query 2 --
UPDATE clients
SET clientLevel = 3
WHERE clientId = 1;
-- Query 3 --
UPDATE inventory
SET invDescription = replace(
        invDescription,
        'small interior',
        'spacious interior'
    )
WHERE inventory.invId = 12;
-- Query 4 --
SELECT inventory.invModel,
    carclassification.classificationName
FROM inventory
    INNER JOIN carclassification ON inventory.classificationId = carclassification.classificationId
WHERE inventory.classificationId = 1;
-- Query 5 --
DELETE FROM inventory
WHERE inventory.invId = 1;
-- Query 6 --
UPDATE inventory
SET invImage = concat('/phpmotors', invImage),
    invThumbnail = concat('/phpmotors', invThumbnail);