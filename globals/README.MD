sql queries to get data from DB

itemname.json

select CONCAT('\"', itemid, '\":'), CONCAT('\"', REPLACE(REPLACE(name, '\'', '\\\''), '_', ' '), '\",') from item_basic


mobname.json

select CONCAT('\"', poolid, '\":'), CONCAT('\"', REPLACE(packet_name, '_', ' '), '\",') from mob_pools

zoneid.json

select CONCAT('\"', zoneid, '\":'), CONCAT('\"', REPLACE(name, '_', ' '), '\",') from zone_settings