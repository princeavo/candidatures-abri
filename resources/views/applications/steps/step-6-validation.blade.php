<div x-show="currentStep === 6" class="space-y-6">
    <x-form.step-header 
        step="6" 
        total="8" 
        title="6. Validation et traction" 
        description="Preuves scientifiques, tests, traction commerciale et reconnaissance (Rubriques 3 et 4)." 
    />

    <div class="space-y-4">
        <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2">Rubrique 3 : Validation scientifique et technique</p>

        <x-form.textarea name="scientific_validation_summary" label="Q8. Preuves de validation scientifique ou technique (résultats, publications, rapports)" rows="3" placeholder="Décrivez les résultats d'essais, publications scientifiques, rapports de tests..." model="formData.scientific_validation_summary" />
        <x-form.file-upload name="scientific_validation_proof" label="Joindre la preuve de validation scientifique (Q8)" icon="attach_file" />

        <x-form.textarea name="real_world_testing_summary" label="Q9. Tests en milieu réel : résultats et observations" rows="3" placeholder="Décrivez les tests auprès des utilisateurs finaux, les résultats obtenus..." model="formData.real_world_testing_summary" />
        <x-form.file-upload name="real_world_testing_proof" label="Joindre vidéo ou preuve de test en milieu réel (Q9)" icon="videocam" hint="Formats : PDF, JPG, PNG, MP4 (moins de 20 Mo)" accept=".pdf,.jpg,.jpeg,.png,.mp4" />

        <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2 pt-2">Rubrique 4 : Traction et reconnaissance</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="p-4 rounded-xl border border-[#E2DBCB] space-y-2">
                <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold">
                    <input type="checkbox" name="commercialization_started" value="1" class="text-[#063527]">
                    Q10. Commercialisation déjà démarrée
                </label>
                <x-form.file-upload name="commercialization_proof" label="Preuve de commercialisation" icon="receipt_long" />
            </div>
            <div class="p-4 rounded-xl border border-[#E2DBCB] space-y-2">
                <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold">
                    <input type="checkbox" name="partnerships_secured" value="1" class="text-[#063527]">
                    Q11. Partenariats déjà noués
                </label>
                <x-form.file-upload name="partnerships_proof" label="Preuve de partenariat" icon="handshake" />
            </div>
        </div>

        <!-- Q12 Manifestations -->
        <div class="space-y-3">
            <label class="block text-sm font-semibold text-[#1c1c16]">Q12. Avez-vous présenté cette invention dans des manifestations ?</label>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5">
                <x-form.checkbox-card name="exhibition_type[]" value="concours" label="Concours" />
                <x-form.checkbox-card name="exhibition_type[]" value="foire" label="Foire" />
                <x-form.checkbox-card name="exhibition_type[]" value="journee_technologique" label="Journée technologique" />
                <x-form.checkbox-card name="exhibition_type[]" value="autre_manifestation" label="Autre" />
            </div>
            <x-form.file-upload name="exhibition_proof" label="Joindre les preuves de participation (Q12)" icon="workspace_premium" />
        </div>

        <!-- Q13 Prix / récompenses -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-form.input name="awards_received" label="Q13. Prix ou récompenses obtenus (intitulé)" placeholder="Nom du prix, organisme..." model="formData.awards_received" />
            <x-form.input name="awards_date" label="Date d'obtention" placeholder="Mois / Année" model="formData.awards_date" />
        </div>

        <!-- Q14 Programme d'accompagnement -->
        <x-form.textarea name="support_program" label="Q14. Avez-vous bénéficié d'un programme d'accompagnement ?" rows="2" placeholder="Incubateur, accélérateur, programme public, mentor..." model="formData.support_program" />
    </div>
</div>
