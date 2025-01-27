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
             DELETE FROM galleries
             WHERE type = 'page_content' AND entity_id = OLD.id;
         END;
     ");

        // Trigger for deleting galleries when a committe is deleted
        DB::statement("
         CREATE TRIGGER delete_committe_galeries
         AFTER DELETE ON committes
         FOR EACH ROW
         BEGIN
             DELETE FROM galleries
             WHERE type = 'committe' AND entity_id = OLD.uuid;
         END;
     ");

        // Trigger for deleting galleries when a program is deleted
        DB::statement("
        CREATE TRIGGER delete_program_galeries
        AFTER DELETE ON programs
        FOR EACH ROW
        BEGIN
            DELETE FROM galleries
            WHERE type = 'program' AND entity_id = OLD.uuid;
        END;
    ");

        // Trigger for deleting page_contacts when a committe is deleted
        DB::statement("
        CREATE TRIGGER delete_committe_contact
        AFTER DELETE ON committes
        FOR EACH ROW
        BEGIN
            DELETE FROM page_contacts
            WHERE type = 'committe' AND entity_id = OLD.uuid;
        END;
    ");

        // Trigger for deleting page_contacts when a page is deleted
        DB::statement("
        CREATE TRIGGER delete_page_contact
        AFTER DELETE ON pages
        FOR EACH ROW
        BEGIN
            DELETE FROM page_contacts
            WHERE type = 'page' AND entity_id = OLD.uuid;
        END;
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delete_relation__triggers');
    }
};
