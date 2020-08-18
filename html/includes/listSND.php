

    <div class="dataTables_scrollHead" >
        <div class="dataTables_scrollHeadInner" >
            <hr class="dataSDNhr">
            <?php foreach ($data as $datum):?>
            <div class="cdn">
                <div class="sdn_title">
                    <div>№<?=$datum->ent_num?> <?=$datum->sdn_name?></div>
                    <div class="sdn_title_more">...</div>
                </div>
                <div class="sdn_info sdn_hidden">
                    <div class="dataSDN">
                    <?php if (!is_null($datum->sdn_name)):?><div class="dataSDNRight">sdn_name:</div><div><?=$datum->sdn_name?></div><?php endif;?>
                    <?php if (!is_null($datum->sdn_type)):?><div class="dataSDNRight">sdn_type:</div><div><?=$datum->sdn_type?></div><?php endif;?>
                    <?php if (!is_null($datum->program)):?><div class="dataSDNRight">program:</div><div><?=$datum->program?></div><?php endif;?>
                    <?php if (!is_null($datum->title)):?><div class="dataSDNRight">title:</div><div><?=$datum->title?></div><?php endif;?>
                    <?php if (!is_null($datum->call_sign)):?><div class="dataSDNRight">call_sign:</div><div><?=$datum->call_sign?></div><?php endif;?>
                    <?php if (!is_null($datum->vess_type)):?><div class="dataSDNRight">vess_type:</div><div><?=$datum->vess_type?></div><?php endif;?>
                    <?php if (!is_null($datum->tonnage)):?><div class="dataSDNRight">tonnage:</div><div><?=$datum->tonnage?></div><?php endif;?>
                    <?php if (!is_null($datum->grt)):?><div class="dataSDNRight">grt:</div><div><?=$datum->grt?></div><?php endif;?>
                    <?php if (!is_null($datum->vess_flag)):?><div class="dataSDNRight">vess_flag:</div><div><?=$datum->vess_flag?></div><?php endif;?>
                    <?php if (!is_null($datum->vess_owner)):?><div class="dataSDNRight">vess_owner:</div><div><?=$datum->vess_owner?></div><?php endif;?>
                    <?php if (!is_null($datum->remarks)):?><div class="dataSDNRight">remarks:</div><div><?=$datum->remarks?></div><?php endif;?>
                    <?php if (!is_null($datum->comment)):?><div class="dataSDNRight">comment:</div><div><?=$datum->comment?></div><?php endif;?>
                    </div>
                    <?php if (!empty($datum->add)):?>
                        <div>Адреса:</div>
                        <div>
                        <?php foreach ($datum->add as $add):?>
                            <hr class="hr-dotted">
                            <div class="dataSDN">
                                <?php if (!is_null($add->address)):?><div class="dataSDNRight">address:</div><div><?=$add->address?></div><?php endif;?>
                                <?php if (!is_null($add->city)):?><div class="dataSDNRight">city:</div><div><?=$add->city?></div><?php endif;?>
                                <?php if (!is_null($add->country)):?><div class="dataSDNRight">country:</div><div><?=$add->country?></div><?php endif;?>
                                <?php if (!is_null($add->add_remarks)):?><div class="dataSDNRight">remarks:</div><div><?=$add->add_remarks?></div><?php endif;?>
                            </div>
                        <?php endforeach;?>
                        </div>
                    <?php endif;?>
                    <?php if (!empty($datum->alt)):?>
                        <div>Альтернативные данные:</div>
                        <div>
                        <?php foreach ($datum->alt as $alt):?>
                            <hr class="hr-dotted">
                            <div class="dataSDN">
                                <?php if (!is_null($alt->alt_name)):?><div class="dataSDNRight">alt_name:</div><div><?=$alt->alt_name?></div><?php endif;?>
                                <?php if (!is_null($alt->alt_type)):?><div class="dataSDNRight">alt_type:</div><div><?=$alt->alt_type?></div><?php endif;?>
                                <?php if (!is_null($alt->alt_remarks)):?><div class="dataSDNRight">alt_remarks:</div><div><?=$alt->alt_remarks?></div><?php endif;?>
                            </div>
                        <?php endforeach;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <hr class="dataSDNhr">
            <?php endforeach;?>
        </div>
    </div>
    <div class="dataTables_info"
         id="tablepress-1_info"
         role="status"
         aria-live="polite">
        <?php if ($count == 0):?>
            Записи не найдены
        <?php elseif(($count - $until_sdn) < 10):?>
            Записи с <?=$from_sdn?> до <?=$count?> из <?=$count?> записей
        <?php else:?>
            Записи с <?=$from_sdn?> до <?=$until_sdn?> из <?=$count?> записей
        <?php endif;?>

    </div>
    <div class="dataTables_paginate paging_simple" id="tablepress-1_paginate">
        <a class="paginate_button previous <?=($from_sdn == 0)?'disabled':''?>"
           aria-controls="tablepress-1"
           data-from="<?=$from_sdn?>"
           tabindex="-1"
           id="tablepress-1_previous">Предыдущая</a>
        <a class="paginate_button next <?=($count < $until_sdn)?'disabled':''?>"
           aria-controls="tablepress-1"
           data-dt-idx="1"
           tabindex="0"
           data-until="<?=$until_sdn?>"
           id="tablepress-1_next">Следующая</a>
    </div>

