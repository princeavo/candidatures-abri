<div x-show="currentStep === 5" class="space-y-6">
    <x-form.step-header 
        step="5" 
        total="8" 
        title="C. Information sur l'invention ou l'innovation" 
        description="Description de la solution, du domaine et de la problématique résolue (Rubriques 1 et 2)." 
    />

    <div class="space-y-4">
        <x-form.input name="invention_name" label="Nom de l'invention / innovation" placeholder="Intitulé officiel de votre invention" model="formData.invention_name" :required="true" />

        <!-- Type d'invention -->
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-[#1c1c16]">Type d'invention / innovation <span class="text-[#E8112D]">*</span></label>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5">
                <x-form.radio-card name="invention_type" value="biens" label="Biens" model="formData.invention_type" />
                <x-form.radio-card name="invention_type" value="services" label="Services" model="formData.invention_type" />
                <x-form.radio-card name="invention_type" value="processus" label="Processus" model="formData.invention_type" />
                <x-form.radio-card name="invention_type" value="autre" label="Autre" model="formData.invention_type" />
            </div>
            <template x-if="errors['invention_type']">
                <p class="text-xs text-[#E8112D] font-medium mt-1" x-text="errors['invention_type']"></p>
            </template>
        </div>

        <!-- Secteur -->
        <x-form.select name="sector" label="Secteur ou domaine prioritaire" model="formData.sector" :required="true">
            <option value="">Sélectionnez un secteur...</option>
            <option value="Agriculture et sécurité alimentaire">Agriculture et sécurité alimentaire</option>
            <option value="Santé numérique et bien-être">Santé numérique et bien-être</option>
            <option value="Eau, assainissement et économie circulaire">Eau, assainissement et économie circulaire</option>
            <option value="Énergie et énergies renouvelables">Énergie et énergies renouvelables</option>
            <option value="Économie numérique, télécommunications, TIC et IA">Économie numérique, télécommunications, TIC et IA</option>
            <option value="Pharmacopée et médecine traditionnelle">Pharmacopée et médecine traditionnelle</option>
            <option value="Matériaux et constructions locales">Matériaux et constructions locales</option>
            <option value="Industrie de transformation, artisanat et commerce">Industrie de transformation, artisanat et commerce</option>
            <option value="Culture et tourisme">Culture et tourisme</option>
            <option value="Villes vertes, écologiques et durables">Villes vertes, écologiques et durables</option>
            <option value="Mécanique et physique">Mécanique et physique</option>
            <option value="Autre">Autre secteur</option>
        </x-form.select>

        <!-- Autre secteur si choisi -->
        <div x-show="formData.sector === 'Autre'">
            <x-form.input name="sector_other" label="Précisez le secteur" model="formData.sector_other" />
        </div>

        <x-form.textarea name="summary" label="Brève description synthétique (résumé)" rows="3" placeholder="Décrivez succinctement la solution, son principe et ses bénéficiaires..." model="formData.summary" :required="true" />

        <!-- Photos x3 -->
        <div class="space-y-3">
            <label class="block text-xs font-semibold uppercase text-[#52625A]">Photos ou schémas de l'invention (jusqu'à 3)</label>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <x-form.file-upload name="invention_photo_1" label="Photo 1" icon="add_photo_alternate" :required="true" />
                <x-form.file-upload name="invention_photo_2" label="Photo 2 (optionnelle)" icon="add_photo_alternate" />
                <x-form.file-upload name="invention_photo_3" label="Photo 3 (optionnelle)" icon="add_photo_alternate" />
            </div>
        </div>

        <!-- Rubrique 1 : Pertinence du problème résolu -->
        <div class="pt-2 space-y-1">
            <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2">Rubrique 1 : Pertinence du problème résolu</p>
        </div>

        <x-form.textarea name="problem_statement" label="Q1. Quel problème votre invention résout-elle ? (manifestations, populations cibles)" rows="3" model="formData.problem_statement" :required="true" />
        <x-form.textarea name="socioeconomic_importance" label="Q2. Importance socioéconomique et environnementale de ce problème" rows="3" model="formData.socioeconomic_importance" :required="true" />
        <x-form.textarea name="benin_context_relevance" label="Q3. En quoi cette solution est-elle adaptée au contexte béninois ?" rows="2" model="formData.benin_context_relevance" :required="true" />

        <!-- Rubrique 2 : Originalité et valeur ajoutée -->
        <div class="pt-2 space-y-1">
            <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2">Rubrique 2 : Originalité et valeur ajoutée</p>
        </div>

        <x-form.textarea name="originality_description" label="Q4. En quoi votre invention est-elle originale ?" rows="3" model="formData.originality_description" :required="true" />
        <x-form.textarea name="differentiation_from_existing" label="Q5. En quoi se distingue-t-elle des solutions existantes ?" rows="3" model="formData.differentiation_from_existing" :required="true" />
        <x-form.textarea name="added_value" label="Q6. Quelle est la valeur ajoutée de votre solution ?" rows="2" model="formData.added_value" :required="true" />
        <x-form.textarea name="resources_access" label="Q7. Avez-vous accès aux ressources nécessaires à son développement ?" rows="2" placeholder="Matériaux, équipements, financement, partenaires..." model="formData.resources_access" />
    </div>
</div>
