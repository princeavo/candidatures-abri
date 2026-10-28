<div x-show="currentStep === 3" class="space-y-6">
    <x-form.step-header 
        step="3" 
        total="8" 
        title="3. Équipe et conditions de recevabilité" 
        description="Composition du groupement ou consortium, et vérification des prérequis réglementaires." 
    />

    <!-- 2.4 Équipe / Consortium -->
    <div x-show="formData.candidacy_type === 'consortium'" class="space-y-4">
        <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2">2.4 Équipe / Consortium</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-form.input name="consortium_name" label="Nom du groupement ou consortium" model="formData.consortium_name" />
            <div class="flex flex-col justify-end gap-2">
                <x-form.checkbox-card name="consortium_has_legal_existence" value="1" label="Le groupement dispose d'une existence juridique" />
                <x-form.checkbox-card name="consortium_has_signed_agreement" value="1" label="Un accord de groupement signé existe" />
            </div>
        </div>

        <!-- Membres de l'équipe -->
        <div class="space-y-3">
            <label class="block text-xs font-semibold uppercase text-[#52625A]">Membres de l'équipe (renseignez autant que nécessaire)</label>
            <template x-for="(member, idx) in teamMembers" :key="idx">
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-3 p-4 rounded-xl border border-[#E2DBCB] bg-[#fdf9f0]/40">
                    <div>
                        <label class="block text-xs text-[#52625A] mb-1">Nom complet</label>
                        <input type="text" :name="'member_name_' + idx" x-model="member.name" class="w-full px-3 py-2 rounded-lg border border-[#c0c8c3] text-xs">
                    </div>
                    <div>
                        <label class="block text-xs text-[#52625A] mb-1">Sexe</label>
                        <select :name="'member_gender_' + idx" x-model="member.gender" class="w-full px-3 py-2 rounded-lg border border-[#c0c8c3] text-xs bg-white">
                            <option value="">--</option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-[#52625A] mb-1">Rôle</label>
                        <input type="text" :name="'member_role_' + idx" x-model="member.role" class="w-full px-3 py-2 rounded-lg border border-[#c0c8c3] text-xs">
                    </div>
                    <div>
                        <label class="block text-xs text-[#52625A] mb-1">% Capital</label>
                        <input type="number" min="0" max="100" :name="'member_capital_pct_' + idx" x-model="member.capital_pct" class="w-full px-3 py-2 rounded-lg border border-[#c0c8c3] text-xs">
                    </div>
                </div>
            </template>
            <button type="button" @click="addTeamMember()" class="text-xs text-[#006c4f] font-semibold flex items-center gap-1 hover:underline">
                <span class="material-symbols-outlined text-sm">add_circle</span> Ajouter un membre
            </button>
        </div>
    </div>

    <div x-show="formData.candidacy_type !== 'consortium'" class="p-4 rounded-xl border border-[#E2DBCB] bg-[#f7f3ea]/40 text-sm text-[#52625A] flex items-center gap-2">
        <span class="material-symbols-outlined text-lg text-[#006c4f]">info</span>
        Pour les candidatures individuelles ou portées par une structure, cette section ne s'applique pas.
    </div>

    <!-- 2.5 Conditions de recevabilité -->
    <div class="space-y-4 pt-2">
        <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2">2.5 Conditions de recevabilité</p>

        <div class="space-y-2">
            <label class="block text-sm font-semibold text-[#1c1c16]">Stade actuel de votre invention / innovation <span class="text-[#E8112D]">*</span></label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                <x-form.radio-card name="trl_stage" value="prototype_teste" label="Prototype testé" model="formData.trl_stage" />
                <x-form.radio-card name="trl_stage" value="petite_serie" label="Petite série" model="formData.trl_stage" />
                <x-form.radio-card name="trl_stage" value="deja_utilise" label="Déjà utilisé / en commercialisation" model="formData.trl_stage" />
                <x-form.radio-card name="trl_stage" value="autre" label="Autre stade" model="formData.trl_stage" />
            </div>
            <template x-if="errors['trl_stage']">
                <p class="text-xs text-[#E8112D] font-medium mt-1" x-text="errors['trl_stage']"></p>
            </template>
        </div>

        <x-form.select name="authorization_status" label="Autorisation ou homologation requise par l'invention" model="formData.authorization_status">
            <option value="ni_lun_ni_lautre">Ni l'une ni l'autre</option>
            <option value="obtenue">Obtenue</option>
            <option value="demandee">Demandée en cours</option>
        </x-form.select>

        <div class="space-y-3">
            <x-form.checkbox-card name="has_health_env_risks" value="1" label="L'invention présente des risques potentiels pour la santé, la sécurité ou l'environnement" />
            <x-form.checkbox-card name="involves_human_animal_trials" value="1" label="Des essais sur des personnes ou des animaux ont été réalisés (avis éthique requis)" />
            <label class="flex items-start gap-3 p-3.5 rounded-xl border border-[#E2DBCB] cursor-pointer hover:bg-[#f7f3ea]/60 transition-all select-none bg-white">
                <input type="checkbox" name="uses_traditional_knowledge" value="1" x-model="formData.uses_traditional_knowledge" class="w-4 h-4 mt-0.5 text-[#063527] rounded-md focus:ring-[#006c4f] border-[#c0c8c3]">
                <div class="flex flex-col">
                    <span class="text-sm font-medium text-[#1c1c16]">L'invention utilise des savoirs ou pratiques traditionnels</span>
                </div>
            </label>
        </div>

        <!-- Accord détenteurs savoirs traditionnels -->
        <div x-show="formData.uses_traditional_knowledge">
            <x-form.select name="traditional_knowledge_consent" label="Accord des détenteurs de savoirs traditionnels" model="formData.traditional_knowledge_consent">
                <option value="obtenu">Accord obtenu</option>
                <option value="en_cours">En cours d'obtention</option>
                <option value="non_applicable">Non applicable</option>
            </x-form.select>
        </div>

        <!-- Confidentialité -->
        <div class="p-4 rounded-xl border border-[#E2DBCB] space-y-2">
            <label class="block text-xs font-semibold uppercase text-[#52625A] mb-1">Traitement confidentiel du dossier</label>
            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 text-sm cursor-pointer">
                    <input type="radio" name="requests_confidentiality" value="oui" class="text-[#063527]"> Oui, je souhaite que mon dossier soit traité de façon confidentielle
                </label>
                <label class="flex items-center gap-2 text-sm cursor-pointer">
                    <input type="radio" name="requests_confidentiality" value="non" checked class="text-[#063527]"> Non
                </label>
            </div>
        </div>
    </div>
</div>
