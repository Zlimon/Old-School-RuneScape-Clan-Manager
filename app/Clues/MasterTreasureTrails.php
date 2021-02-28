<?php

namespace App\Clues;

use Illuminate\Database\Eloquent\Model;

class MasterTreasureTrails extends Model
{
    protected $table = 'master_treasure_trails';

    protected $fillable = [
        'obtained',
        'kill_count',
        'bloodhound',
        '3rd_age_pickaxe',
        '3rd_age_axe',
        '3rd_age_longsword',
        '3rd_age_wand',
        '3rd_age_cloak',
        '3rd_age_bow',
        '3rd_age_range_coif',
        '3rd_age_range_top',
        '3rd_age_range_legs',
        '3rd_age_vambraces',
        '3rd_age_robe_top',
        '3rd_age_robe',
        '3rd_age_mage_hat',
        '3rd_age_amulet',
        '3rd_age_plateskirt',
        '3rd_age_platelegs',
        '3rd_age_platebody',
        '3rd_age_full_helmet',
        '3rd_age_kiteshield',
        '3rd_age_druidic_robe_bottoms',
        '3rd_age_druidic_robe_top',
        '3rd_age_druidic_staff',
        '3rd_age_druidic_cloak',
        'ring_of_3rd_age',
        'gilded_scimitar',
        'gilded_boots',
        'gilded_platebody',
        'gilded_platelegs',
        'gilded_plateskirt',
        'gilded_full_helm',
        'gilded_kiteshield',
        'gilded_med_helm',
        'gilded_chainbody',
        'gilded_sq_shield',
        'gilded_2h_sword',
        'gilded_spear',
        'gilded_hasta',
        'gilded_coif',
        'gilded_dhide_vambraces',
        'gilded_dhide_body',
        'gilded_dhide_chaps',
        'gilded_pickaxe',
        'gilded_axe',
        'gilded_spade',
        'bucket_helm_(g)',
        'ring_of_coins',
        'armadyl_godsword_ornament_kit',
        'bandos_godsword_ornament_kit',
        'saradomin_godsword_ornament_kit',
        'zamorak_godsword_ornament_kit',
        'occult_ornament_kit',
        'torture_ornament_kit',
        'anguish_ornament_kit',
        'dragon_defender_ornament_kit',
        'dragon_kiteshield_ornament_kit',
        'dragon_platebody_ornament_kit',
        'tormented_ornament_kit',
        'hood_of_darkness',
        'robe_top_of_darkness',
        'robe_bottom_of_darkness',
        'gloves_of_darkness',
        'boots_of_darkness',
        'samurai_kasa',
        'samurai_shirt',
        'samurai_greaves',
        'samurai_boots',
        'samurai_gloves',
        'ankou_mask',
        'ankou_top',
        'ankou_gloves',
        'ankou_socks',
        'ankous_leggings',
        'mummys_head',
        'mummys_feet',
        'mummys_hands',
        'mummys_legs',
        'mummys_body',
        'shayzien_hood',
        'hosidius_hood',
        'arceuus_hood',
        'piscarilius_hood',
        'lovakengj_hood',
        'lesser_demon_mask',
        'greater_demon_mask',
        'black_demon_mask',
        'jungle_demon_mask',
        'old_demon_mask',
        'left_eye_patch',
        'bowl_wig',
        'ale_of_the_gods',
        'obsidian_cape_(r)',
        'half_moon_spectacles',
        'fancy_tiara',
    ];

    protected $hidden = ['user_id'];

    public function account()
    {
        return $this->belongsTo(\App\Account::class);
    }
}