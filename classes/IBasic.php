<?php
// Basisklassen, deren (Attributs-)Werte in gleichnamige Tabellen gespeichert werden,
// sollen dieses interface einbinden
interface IBasic
{
    public function getObjectById(int $id);
    public function getAllAsObjects();
    public  function deleteObjectById(int $id);

}