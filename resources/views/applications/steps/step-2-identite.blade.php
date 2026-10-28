<div x-show="currentStep === 2" class="space-y-6">
    <x-form.step-header 
        step="2" 
        total="8" 
        title="2. Identité et éligibilité" 
        description="Informations relatives au candidat principal ou à la structure porteuse." 
    />

    <!-- 2.1 Nature de la candidature -->
    <div class="space-y-2">
        <label class="text-sm font-semibold text-[#1c1c16]">2.1 Nature de la candidature <span class="text-[#E8112D] font-bold">*</span></label>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <x-form.radio-card name="candidacy_type" value="individual" label="Individuelle" model="formData.candidacy_type" />
            <x-form.radio-card name="candidacy_type" value="corporate" label="Portée par une structure" model="formData.candidacy_type" />
            <x-form.radio-card name="candidacy_type" value="consortium" label="Équipe / Consortium" model="formData.candidacy_type" />
        </div>
    </div>

    <!-- Type de structure (conditionnel) -->
    <div x-show="formData.candidacy_type === 'corporate'" class="space-y-2">
        <x-form.select name="structure_type" label="Type de structure" model="formData.structure_type" :required="true">
            <option value="">Sélectionnez...</option>
            <option value="entreprise">Entreprise</option>
            <option value="association">Association / ONG / Coopérative</option>
            <option value="universite">Université / Institution de recherche</option>
            <option value="publique">Structure publique ou parapublique</option>
            <option value="autre">Autre</option>
        </x-form.select>
    </div>

    <!-- 2.2 Candidat principal -->
    <div class="space-y-1 pt-2">
        <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2">2.2 Candidat principal</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-form.input name="last_name" label="Nom" model="formData.last_name" :required="true" />
        <x-form.input name="first_name" label="Prénoms" model="formData.first_name" :required="true" />

        <x-form.select name="gender" label="Sexe" model="formData.gender" :required="true">
            <option value="">Sélectionnez...</option>
            <option value="M">Masculin</option>
            <option value="F">Féminin</option>
        </x-form.select>

        <x-form.input name="date_of_birth" label="Date de naissance" type="date" model="formData.date_of_birth" :required="true" />

        <x-form.select name="nationality" label="Nationalité" model="formData.nationality" :required="true">
            <option value="Béninoise">Béninoise</option>
            <option value="Autre">Autre</option>
        </x-form.select>

        <x-form.select name="country_of_residence" label="Pays de résidence" model="formData.country_of_residence" :required="true">
            <option value="Bénin">Bénin</option>
            <option value="Autre">Autre pays</option>
        </x-form.select>

        <!-- Précision pays si Autre -->
        <div x-show="formData.country_of_residence === 'Autre'" class="sm:col-span-2">
            <x-form.input name="country_of_residence_other" label="Précisez le pays de résidence" placeholder="Ex: France, Côte d'Ivoire..." model="formData.country_of_residence_other" />
        </div>

        <x-form.input name="phone" label="Téléphone" type="tel" placeholder="+229 ..." model="formData.phone" :required="true" />
        <x-form.input name="email" label="Adresse email" type="email" placeholder="nom@exemple.bj" model="formData.email" :required="true" />

        <x-form.input name="profession" label="Profession ou fonction" model="formData.profession" />
        <x-form.input name="organization" label="Structure de rattachement" model="formData.organization" />

        <x-form.select name="department" label="Département (siège)" model="formData.department">
            <option value="">Sélectionnez un département</option>
            <option value="Alibori">Alibori</option>
            <option value="Atacora">Atacora</option>
            <option value="Atlantique">Atlantique</option>
            <option value="Borgou">Borgou</option>
            <option value="Collines">Collines</option>
            <option value="Couffo">Couffo</option>
            <option value="Donga">Donga</option>
            <option value="Littoral">Littoral</option>
            <option value="Mono">Mono</option>
            <option value="Ouémé">Ouémé</option>
            <option value="Plateau">Plateau</option>
            <option value="Zou">Zou</option>
            <option value="Hors du Bénin">Hors du Bénin</option>
        </x-form.select>

        <x-form.input name="municipality" label="Commune (siège)" model="formData.municipality" />
    </div>

    <!-- Preuve de nationalité -->
    <x-form.file-upload 
        name="nationality_proof" 
        label="Preuve de nationalité (Certificat de nationalité, CIP, passeport, acte)" 
        :required="true" 
    />

    <!-- 2.3 Conditions particulières -->
    <div class="space-y-4 pt-2">
        <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2">2.3 Conditions particulières</p>

        <div class="p-4 rounded-xl border border-[#E2DBCB] space-y-2" :class="errors['benefits_beninese_population'] ? 'border-[#E8112D] bg-[#fff8f8]' : ''">
            <label class="block text-sm font-semibold text-[#1c1c16] mb-2">Votre invention/innovation bénéficiera-t-elle en priorité aux populations béninoises ? <span class="text-[#E8112D]">*</span></label>
            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 text-sm cursor-pointer">
                    <input type="radio" name="benefits_beninese_population" value="oui" x-model="formData.benefits_beninese_population" @change="clearError('benefits_beninese_population')" class="text-[#063527]"> Oui
                </label>
                <label class="flex items-center gap-2 text-sm cursor-pointer">
                    <input type="radio" name="benefits_beninese_population" value="non" x-model="formData.benefits_beninese_population" @change="clearError('benefits_beninese_population')" class="text-[#063527]"> Non
                </label>
            </div>
            <template x-if="errors['benefits_beninese_population']">
                <p class="text-xs text-[#E8112D] font-medium mt-1" x-text="errors['benefits_beninese_population']"></p>
            </template>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-form.input name="cofounders_outside_benin_pct" label="Pourcentage de cofondateurs hors Bénin (%)" type="number" min="0" max="100" placeholder="0" model="formData.cofounders_outside_benin_pct" />
            <x-form.input name="members_outside_benin_pct" label="Pourcentage de membres hors Bénin (%)" type="number" min="0" max="100" placeholder="0" model="formData.members_outside_benin_pct" />
        </div>
    </div>
</div>
