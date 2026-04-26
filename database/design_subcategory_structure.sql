-- Migration: create_subcategories_table.sql
CREATE TABLE `subcategories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `section_id` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`section_id`) REFERENCES `sections`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Migration: add_subcategory_id_to_articles.sql
ALTER TABLE `articles`
  ADD COLUMN `subcategory_id` INT(11) NULL AFTER `section_id`,
  ADD CONSTRAINT `fk_articles_subcategory_id` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories`(`id`) ON DELETE SET NULL;

-- Eloquent Model: Subcategory.php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['section_id', 'name'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
