<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('fn');
            $table->string('ln');
            $table->string('em')->unique();
            $table->string('ph')->unique();
            $table->string('mb')->unique();
            $table->string('sec_em')->nullable();
            $table->string('stu_gid')->nullable();
            $table->string('stu_pass')->nullable();
            $table->string('em_con')->nullable();
            $table->string('ld_src');
            $table->string('ld_cat');
            $table->string('ld_typ');
            $table->string('ld_flg');
            $table->string('ld_st');
            $table->string('ld_pri');
            $table->integer('re_cnt');
            $table->boolean('rc_ld');
            $table->string('ld_shr');
            $table->string('con_st');
            $table->integer('ld_scr');
            $table->boolean('ld_sel');
            $table->integer('cnt_in');
            $table->string('cr_by');
            $table->string('md_by');
            $table->string('prev_ow');
            $table->boolean('stu_ls');
            $table->string('stu_ls_st');
            $table->text('stu_ls_rs');
            $table->text('nw_res');
            $table->string('stu_st');
            $table->string('temp_ow');
            $table->uuid('upd_ld');
            $table->boolean('int_ld');
            $table->integer('of_cnt');
            $table->boolean('otp_vf');
            $table->string('l2_cd');
            $table->string('l2_disp');
            $table->string('pg_lnk');
            $table->string('act_pri');
            $table->boolean('evt_atd');
            $table->uuid('fair_id');
            $table->string('fair_qr');
            $table->string('utm_src');
            $table->boolean('new_prc');
            $table->boolean('auto_up');
            $table->string('frm_pg');
            $table->string('pg_cat');
            $table->string('pg_typ');
            $table->text('rmks');
            $table->string('utm_cmp');
            $table->boolean('has_ps');
            $table->string('cntry_pref');
            $table->string('pref_cn2');
            $table->string('uni_fin');
            $table->date('uni_fd');
            $table->string('docs_st');
            $table->string('uni_sl');
            $table->boolean('temp_sl');
            $table->string('pref_crs');
            $table->string('pref_itk');
            $table->string('pref_ss');
            $table->string('pref_cn_cd');
            $table->string('fund_src');
            $table->text('pr_visa');
            $table->string('usp_prs');
            $table->date('uni_sd');
            $table->date('uni_sl_date');
            $table->string('oth_cn');
            $table->string('land_cn');
            $table->string('pref_uni');
            $table->string('uni_list');
            $table->boolean('brw_pref');
            $table->string('prim_cn');
            $table->integer('gre_scr')->nullable();
            $table->integer('gmat_scr')->nullable();
            $table->integer('ielts_scr')->nullable();
            $table->integer('sat_scr')->nullable();
            $table->integer('pte_scr')->nullable();
            $table->integer('toefl_scr')->nullable();
            $table->integer('det_scr')->nullable();
            $table->string('exm_bkd');
            $table->date('exm_bd');
            $table->date('loan_date')->nullable();
            $table->dateTime('last_act');
            $table->dateTime('last_call');
            $table->dateTime('last_con');
            $table->date('last_fup')->nullable();
            $table->date('fup_mark')->nullable();
            $table->dateTime('con_dt');
            $table->date('det_prof')->nullable();
            $table->date('lt_revisit')->nullable();
            $table->date('ld_sell_up')->nullable();
            $table->date('stu_ls_date')->nullable();
            $table->date('uni_f_date')->nullable();
            $table->date('uni_sl_date')->nullable();
            $table->dateTime('assign_dt');
            $table->dateTime('shrt_pres_date');
            $table->string('10th_sch');
            $table->string('12th_sch');
            $table->string('grad_crs');
            $table->string('grad_ss');
            $table->string('pg_crs');
            $table->string('pg_ss');
            $table->integer('pct_10th');
            $table->integer('pct_12th');
            $table->integer('pct_grad');
            $table->integer('pct_pg')->nullable();
            $table->integer('gap_yrs')->nullable();
            $table->integer('backlogs')->nullable();
            $table->text('wrk_exp')->nullable();
            $table->text('wrk_prof')->nullable();
            $table->string('grad_uni');
            $table->string('pg_uni')->nullable();
            $table->string('high_edu');
            $table->year('grad_yr');
            $table->year('pg_yr')->nullable();
            $table->integer('eng_10');
            $table->year('10th_py');
            $table->string('10th_bd');
            $table->string('12th_bd');
            $table->integer('eng_12');
            $table->year('12th_py');
            $table->string('12th_ss');
            $table->string('con_ow');
            $table->string('con_ow_em');
            $table->string('con_ow_mb');
            $table->string('con_ow_pod');
            $table->string('app_poc');
            $table->string('ld_ow_pod');
            $table->string('ld_ow');
            $table->text('addr_cur');
            $table->string('city');
            $table->string('state');
            $table->text('perm_addr');
            $table->string('cntry');
            $table->string('cntry_cd');
            $table->string('ref_nm');
            $table->string('ref_em');
            $table->string('ref_mb');
            $table->boolean('loan_req');
            $table->date('loan_date')->nullable();
            $table->decimal('budget', 10, 2);
            $table->string('src_fund');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
};
