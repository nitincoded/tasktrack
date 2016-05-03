<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity.
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $project_id
 * @property \App\Model\Entity\Project $project
 * @property int $site_id
 * @property \App\Model\Entity\Site $site
 * @property int $type_id
 * @property \App\Model\Entity\Type $type
 * @property int $status_id
 * @property \App\Model\Entity\Status $status
 * @property int $milestone_id
 * @property \App\Model\Entity\Milestone $milestone
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Ticket extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
