<?php

namespace App\Observers;

use App\Models\Documents;

class DocumentsObserver
{
    /**
     * Handle the Documents "created" event.
     *
     * @param  \App\Models\Documents  $documents
     * @return void
     */
    public function created(Documents $documents)
    {
        //
    }

    /**
     * Handle the Documents "updated" event.
     *
     * @param  \App\Models\Documents  $documents
     * @return void
     */
    public function updated(Documents $documents)
    {
        //
    }

    /**
     * Handle the Documents "deleted" event.
     *
     * @param  \App\Models\Documents  $documents
     * @return void
     */
    public function deleted(Documents $documents)
    {
        //
    }

    /**
     * Handle the Documents "restored" event.
     *
     * @param  \App\Models\Documents  $documents
     * @return void
     */
    public function restored(Documents $documents)
    {
        //
    }

    /**
     * Handle the Documents "force deleted" event.
     *
     * @param  \App\Models\Documents  $documents
     * @return void
     */
    public function forceDeleted(Documents $documents)
    {
        //
    }
}
