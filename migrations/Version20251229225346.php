<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251229225346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette ADD base_id INT DEFAULT NULL, ADD sirop_id INT DEFAULT NULL, ADD topping_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB63906967DF41 FOREIGN KEY (base_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390F664B0C4 FOREIGN KEY (sirop_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390E9C2067C FOREIGN KEY (topping_id) REFERENCES ingredient (id)');
        $this->addSql('CREATE INDEX IDX_49BB63906967DF41 ON recette (base_id)');
        $this->addSql('CREATE INDEX IDX_49BB6390F664B0C4 ON recette (sirop_id)');
        $this->addSql('CREATE INDEX IDX_49BB6390E9C2067C ON recette (topping_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390A76ED395');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB63906967DF41');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390F664B0C4');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390E9C2067C');
        $this->addSql('DROP INDEX IDX_49BB63906967DF41 ON recette');
        $this->addSql('DROP INDEX IDX_49BB6390F664B0C4 ON recette');
        $this->addSql('DROP INDEX IDX_49BB6390E9C2067C ON recette');
        $this->addSql('ALTER TABLE recette DROP base_id, DROP sirop_id, DROP topping_id');
    }
}
