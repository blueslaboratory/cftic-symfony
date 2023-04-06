<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220819084642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // modificado el orden al orden de creacion de tablas --> vale esto no ha funcionado

        $this->addSql('ALTER TABLE localizacion DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE localizacion CHANGE PAIS PAIS VARCHAR(30) DEFAULT \'NULL\', CHANGE COMUNIDAD COMUNIDAD VARCHAR(50) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE localizacion ADD PRIMARY KEY (MUNICIPIO, DISTRITO)');
        
        $this->addSql('ALTER TABLE pupilos CHANGE EMAIL EMAIL VARCHAR(40) DEFAULT \'NULL\', CHANGE PASSWORD PASSWORD VARCHAR(20) DEFAULT \'NULL\', CHANGE NOMBRE NOMBRE VARCHAR(20) DEFAULT \'NULL\', CHANGE APELLIDOS APELLIDOS VARCHAR(20) DEFAULT \'NULL\', CHANGE FNAC FNAC DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE senseis CHANGE EMAIL EMAIL VARCHAR(40) DEFAULT \'NULL\', CHANGE PASSWORD PASSWORD VARCHAR(20) DEFAULT \'NULL\', CHANGE NOMBRE NOMBRE VARCHAR(20) DEFAULT \'NULL\', CHANGE APELLIDOS APELLIDOS VARCHAR(20) DEFAULT \'NULL\', CHANGE FNAC FNAC DATE DEFAULT \'NULL\'');

        $this->addSql('ALTER TABLE actividades CHANGE PRECIO PRECIO NUMERIC(5, 2) DEFAULT \'0\'');
        
        $this->addSql('ALTER TABLE pupilos_actividades RENAME INDEX codactividad_pa TO IDX_83DB2B013B98C41B');
        $this->addSql('ALTER TABLE senseis_actividades RENAME INDEX codactividad_sa TO IDX_C47F483010B597D8');

        $this->addSql('ALTER TABLE transacciones CHANGE CANTIDAD CANTIDAD NUMERIC(5, 2) DEFAULT \'NULL\', CHANGE ESTADO ESTADO VARCHAR(15) DEFAULT \'NULL\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // modificado el orden al orden de creacion de tablas --> vale esto no ha funcionado

        $this->addSql('ALTER TABLE localizacion DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE localizacion CHANGE PAIS PAIS VARCHAR(30) DEFAULT NULL, CHANGE COMUNIDAD COMUNIDAD VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE localizacion ADD PRIMARY KEY (DISTRITO, MUNICIPIO)');
        
        $this->addSql('ALTER TABLE pupilos CHANGE EMAIL EMAIL VARCHAR(40) DEFAULT NULL, CHANGE PASSWORD PASSWORD VARCHAR(20) DEFAULT NULL, CHANGE NOMBRE NOMBRE VARCHAR(20) DEFAULT NULL, CHANGE APELLIDOS APELLIDOS VARCHAR(20) DEFAULT NULL, CHANGE FNAC FNAC DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE senseis CHANGE EMAIL EMAIL VARCHAR(40) DEFAULT NULL, CHANGE PASSWORD PASSWORD VARCHAR(20) DEFAULT NULL, CHANGE NOMBRE NOMBRE VARCHAR(20) DEFAULT NULL, CHANGE APELLIDOS APELLIDOS VARCHAR(20) DEFAULT NULL, CHANGE FNAC FNAC DATE DEFAULT NULL');

        $this->addSql('ALTER TABLE actividades CHANGE PRECIO PRECIO NUMERIC(5, 2) DEFAULT \'0.00\'');
        
        $this->addSql('ALTER TABLE pupilos_actividades RENAME INDEX idx_83db2b013b98c41b TO CODACTIVIDAD_PA');
        $this->addSql('ALTER TABLE senseis_actividades RENAME INDEX idx_c47f483010b597d8 TO CODACTIVIDAD_SA');

        $this->addSql('ALTER TABLE transacciones CHANGE CANTIDAD CANTIDAD NUMERIC(5, 2) DEFAULT NULL, CHANGE ESTADO ESTADO VARCHAR(15) DEFAULT NULL');
    }
}
