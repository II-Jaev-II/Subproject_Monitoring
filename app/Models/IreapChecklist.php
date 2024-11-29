<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IreapChecklist extends Model
{

    protected $table = 'ireap_checklists';

    protected $fillable =
    [
        'userId',
        'subprojectId',
        'reviewDate',
        'registeredAgency',
        'authenticatedCopy',
        'byLaws',
        'certificateOfRegistration',
        'certificateRegistry',
        'certificates',
        'accomplishmentReports',
        'photographs',
        'existingOrganizationalStructure',
        'secretaryCertificate',
        'fcaMembersProfile',
        'photocopyReceipt',
        'latestFinancialReport',
        'swornAffidavit',
        'moa',
        'releaseOfFunds',
        'priorityCommodity',
    ];

    use HasFactory;
}
