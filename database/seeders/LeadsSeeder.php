<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Lead;
use Carbon\Carbon;

class LeadsSeeder extends Seeder
{
 
    public function run()
    {
        $faker = Faker::create();
        $records = [];

        for ($i = 1; $i <= 1000000; $i++) {
            $records[] = [
            'id' => $i,
            'fn' => $faker->firstName,
            'ln' => $faker->lastName,
            'em' => $faker->unique()->safeEmail,
            'ph' => $faker->unique()->numerify('##########'),
            'mb' => $faker->unique()->numerify('##########'),
            'sec_em' => $faker->optional()->safeEmail,
            'stu_gid' => $faker->optional()->email,
            'stu_pass' => $faker->optional()->password,
            'em_con' => $faker->optional()->numerify('##########'),
            'ld_src' => $faker->randomElement(['Referral', 'Online', 'Walk-In']),
            'ld_cat' => $faker->randomElement(['New', 'Existing']),
            'ld_typ' => $faker->randomElement(['Hot', 'Cold']),
            'ld_flg' => $faker->boolean ? 'Y' : 'N',
            'ld_st' => $faker->randomElement(['Pending', 'Follow-up', 'Closed']),
            'ld_pri' => $faker->randomElement(['High', 'Medium', 'Low']),
            're_cnt' => $faker->numberBetween(0, 10),
            'rc_ld' => $faker->boolean,
            'ld_shr' => $faker->boolean ? 'Yes' : 'No',
            'con_st' => $faker->randomElement(['Initial', 'Final', 'Intermediate']),
            'ld_scr' => $faker->numberBetween(1, 100),
            'ld_sel' => $faker->boolean,
            'cnt_in' => $faker->numberBetween(1, 5),
            'cr_by' => $faker->name,
            'md_by' => $faker->name,
            'prev_ow' => $faker->name,
            'stu_ls' => $faker->boolean,
            'stu_ls_st' => $faker->randomElement(['Initial', 'Final']),
            'stu_ls_rs' => $faker->sentence,
            'nw_res' => $faker->sentence,
            'stu_st' => $faker->randomElement(['Active', 'Inactive']),
            'temp_ow' => $faker->name,
            'upd_ld' => $faker->uuid,
            'int_ld' => $faker->boolean,
            'of_cnt' => $faker->numberBetween(1, 5),
            'otp_vf' => $faker->boolean,
            'l2_cd' => $faker->randomElement(['Positive', 'Negative']),
            'l2_disp' => $faker->randomElement(['Completed', 'Pending']),
            'pg_lnk' => $faker->url,
            'act_pri' => $faker->randomElement(['High', 'Medium', 'Low']),
            'evt_atd' => $faker->boolean,
            'fair_id' => $faker->uuid,
            'fair_qr' => $faker->url,
            'utm_src' => $faker->randomElement(['Google', 'Facebook', 'Instagram']),
            'new_prc' => $faker->boolean,
            'auto_up' => $faker->boolean,
            'frm_pg' => $faker->randomElement(['Home', 'Contact', 'About']),
            'pg_cat' => $faker->randomElement(['Education', 'Marketing']),
            'pg_typ' => $faker->randomElement(['Landing', 'Conversion']),
            'rmks' => $faker->sentence,
            'utm_cmp' => $faker->word,
            'has_ps' => $faker->boolean,
            'cntry_pref' => $faker->country,
            'pref_cn2' => $faker->country,
            'uni_fin' => $faker->company,
            'uni_fd' => $faker->date,
            'docs_st' => $faker->randomElement(['Complete', 'Incomplete']),
            'uni_sl' => $faker->url,
            'temp_sl' => $faker->boolean,
            'pref_crs' => $faker->word,
            'pref_itk' => $faker->randomElement(['Fall', 'Spring', 'Winter']),
            'pref_ss' => $faker->word,
            'pref_cn_cd' => $faker->countryCode,
            'fund_src' => $faker->randomElement(['Parents', 'Loan']),
            'pr_visa' => $faker->sentence,
            'usp_prs' => $faker->randomElement(['Online', 'Offline']),
            'uni_sd' => $faker->date,
            'uni_sl_date' => $faker->date,
            'oth_cn' => $faker->country,
            'land_cn' => $faker->country,
            'pref_uni' => $faker->company,
            'uni_list' => $faker->company,
            'brw_pref' => $faker->boolean,
            'prim_cn' => $faker->country,
            'gre_scr' => $faker->optional()->numberBetween(260, 340),
            'gmat_scr' => $faker->optional()->numberBetween(200, 800),
            'ielts_scr' => $faker->optional()->numberBetween(1, 9),
            'sat_scr' => $faker->optional()->numberBetween(400, 1600),
            'pte_scr' => $faker->optional()->numberBetween(10, 90),
            'toefl_scr' => $faker->optional()->numberBetween(0, 120),
            'det_scr' => $faker->optional()->numberBetween(10, 160),
            'exm_bkd' => $faker->boolean ? 'Yes' : 'No',
            'exm_bd' => $faker->date,
            'loan_date' => $faker->optional()->date,
            'last_act' => Carbon::parse($faker->dateTimeBetween('-1 years', 'now'))->format('Y-m-d H:i:s'),
            'last_call' => Carbon::parse($faker->dateTimeBetween('-1 years', 'now'))->format('Y-m-d H:i:s'),
            'last_con' => Carbon::parse($faker->dateTimeBetween('-1 years', 'now'))->format('Y-m-d H:i:s'),
            'last_fup' => $faker->optional()->date,
            'fup_mark' => $faker->optional()->date,
            'con_dt' => Carbon::parse($faker->dateTimeBetween('-1 years', 'now'))->format('Y-m-d H:i:s'),
            'det_prof' => $faker->optional()->date,
            'lt_revisit' => $faker->optional()->date,
            'ld_sell_up' => $faker->optional()->date,
            'stu_ls_date' => $faker->optional()->date,
            'uni_f_date' => $faker->optional()->date,
            'assign_dt' => Carbon::parse($faker->dateTimeBetween('-1 years', 'now'))->format('Y-m-d H:i:s'),
            'shrt_pres_date' => Carbon::parse($faker->dateTimeBetween('-1 years', 'now'))->format('Y-m-d H:i:s'),
            '10th_sch' => $faker->company,
            '12th_sch' => $faker->company,
            'grad_crs' => $faker->word,
            'grad_ss' => $faker->word,
            'pg_crs' => $faker->word,
            'pg_ss' => $faker->word,
            'pct_10th' => $faker->numberBetween(50, 100),
            'pct_12th' => $faker->numberBetween(50, 100),
            'pct_grad' => $faker->numberBetween(50, 100),
            'pct_pg' => $faker->optional()->numberBetween(50, 100),
            'gap_yrs' => $faker->optional()->numberBetween(0, 5),
            'backlogs' => $faker->optional()->numberBetween(0, 10),
            'wrk_exp' => $faker->optional()->sentence,
            'wrk_prof' => $faker->optional()->sentence,
            'grad_uni' => $faker->company,
            'pg_uni' => $faker->optional()->company,
            'high_edu' => $faker->randomElement(['10th', '12th', 'Graduation', 'PG']),
            'grad_yr' => $faker->year,
            'pg_yr' => $faker->optional()->year,
            'eng_10' => $faker->numberBetween(1, 100),
            '10th_py' => $faker->year,
            '10th_bd' => $faker->randomElement(['CBSE', 'State Board']),
            '12th_bd' => $faker->randomElement(['CBSE', 'State Board']),
            'eng_12' => $faker->numberBetween(1, 100),
            '12th_py' => $faker->year,
            '12th_ss' => $faker->word,
            'con_ow' => $faker->name,
            'con_ow_em' => $faker->safeEmail,
            'con_ow_mb' => $faker->numerify('##########'),
            'con_ow_pod' => $faker->word,
            'app_poc' => $faker->name,
            'ld_ow_pod' => $faker->word,
            'ld_ow' => $faker->name,
            'addr_cur' => $faker->address,
            'city' => $faker->city,
            'state' => $faker->state,
            'perm_addr' => $faker->address,
            'cntry' => $faker->country,
            'cntry_cd' => $faker->countryCode,
            'ref_nm' => $faker->name,
            'ref_em' => $faker->safeEmail,
            'ref_mb' => $faker->numerify('##########'),
            'loan_req' => $faker->boolean,
            'loan_date' => $faker->optional()->date,
            'budget' => $faker->randomFloat(2, 1000, 100000),
            'src_fund' => $faker->randomElement(['Personal Savings', 'Family', 'Others'])
            ];
            
            Lead::insert($records);
            $records = [];
        }
    }

    // private function datetime()
    // {
    //     $startDate = new \DateTime('2023-01-01 00:00:00');
    //     $endDate = new \DateTime('2024-12-31 23:59:59');
    //     $interval = $endDate->getTimestamp() - $startDate->getTimestamp();
    //     $randomTimestamp = $startDate->getTimestamp() + mt_rand(0, $interval);
    //     $randomDate = new \DateTime();
    //     $randomDate->setTimestamp($randomTimestamp);
    //     return $randomDate->format('Y-m-d H:i:s');
    // }
}
