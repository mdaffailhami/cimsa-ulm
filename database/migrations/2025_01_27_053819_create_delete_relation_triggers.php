<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Trigger for deleting galleries when an page_content is deleted
        DB::statement("
         CREATE TRIGGER delete_page_content_galleries
         AFTER DELETE ON page_contents
         FOR EACH ROW
         BEGIN
            IF EXISTS (SELECT 1 FROM galleries WHERE type = 'page_content' AND entity_id = OLD.uuid) THEN
                DELETE FROM galleries 
                WHERE type = 'page_content' AND entity_id = OLD.uuid;
            END IF;
         END;
     ");

        // Trigger for deleting galleries when a committe is deleted
        DB::statement("
         CREATE TRIGGER delete_committe_galeries
         AFTER DELETE ON committes
         FOR EACH ROW
         BEGIN
            IF EXISTS (SELECT 1 FROM galleries WHERE type = 'committe' AND entity_id = OLD.uuid) THEN
                DELETE FROM galleries
                WHERE type = 'committe' AND entity_id = OLD.uuid;
            END IF;
         END;
     ");

        // Trigger for deleting galleries when a program is deleted
        DB::statement("
        CREATE TRIGGER delete_program_galeries
        AFTER DELETE ON programs
        FOR EACH ROW
        BEGIN
            IF EXISTS (SELECT 1 FROM galleries WHERE type = 'program' AND entity_id = OLD.uuid) THEN
                DELETE FROM galleries
                WHERE type = 'program' AND entity_id = OLD.uuid;
            END IF;
        END;
    ");

        // Trigger for deleting galleries when an cimsa_profile is deleted
        DB::statement("
        CREATE TRIGGER delete_cimsa_profile_galleries
        AFTER DELETE ON cimsa_profiles
        FOR EACH ROW
        BEGIN
            IF EXISTS (SELECT 1 FROM galleries WHERE type = 'cimsa_profile' AND entity_id = OLD.uuid) THEN
                DELETE FROM galleries
                WHERE type = 'cimsa_profile' AND entity_id = OLD.uuid;
            END IF;
        END;
    ");

        // Trigger for deleting page_contacts when a committe is deleted
        DB::statement("
        CREATE TRIGGER delete_committe_contact
        AFTER DELETE ON committes
        FOR EACH ROW
        BEGIN
            IF EXISTS (SELECT 1 FROM page_contacts WHERE type = 'committe' AND entity_id = OLD.uuid) THEN
                DELETE FROM page_contacts
                WHERE type = 'committe' AND entity_id = OLD.uuid;
            END IF;
        END;
    ");

        // Trigger for deleting page_contacts when a page is deleted
        DB::statement("
        CREATE TRIGGER delete_page_contact
        AFTER DELETE ON pages
        FOR EACH ROW
        BEGIN
            IF EXISTS (SELECT 1 FROM page_contacts WHERE type = 'page' AND entity_id = OLD.uuid) THEN
                DELETE FROM page_contacts
                WHERE type = 'page' AND entity_id = OLD.uuid;
            END IF;
        END;
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TRIGGER IF EXISTS delete_page_content_galleries");
        DB::statement("DROP TRIGGER IF EXISTS delete_committe_galeries");
        DB::statement("DROP TRIGGER IF EXISTS delete_program_galeries");
        DB::statement("DROP TRIGGER IF EXISTS delete_cimsa_profile_galleries");
        DB::statement("DROP TRIGGER IF EXISTS delete_committe_contact");
        DB::statement("DROP TRIGGER IF EXISTS delete_page_contact");
    }
};
