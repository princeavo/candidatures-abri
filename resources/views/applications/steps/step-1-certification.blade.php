<div x-show="currentStep === 1" class="space-y-6">
    <x-form.step-header 
        step="1" 
        total="8" 
        title="A. Déclaration sur l'honneur" 
        description="L'engagement sur l'honneur est préalable à toute candidature." 
    />

    <div class="bg-[#E6F2EC] border border-[#9dbbad] p-5 rounded-xl space-y-3">
        <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-2xl text-[#006c4f] shrink-0">verified_user</span>
            <div class="text-sm text-[#001e14] space-y-2 leading-relaxed">
                <p class="font-semibold">Engagement officiel du candidat :</p>
                <p>
                    « Je, soussigné(e), certifie sur l'honneur être le/la véritable auteur(e) ou le/la détenteur(trice) légitime de l'invention ou de l'innovation soumise. Je déclare que cette oeuvre est originale et ne porte atteinte à aucun droit de propriété intellectuelle appartenant à un tiers. »
                </p>
            </div>
        </div>
    </div>

    <div class="space-y-4 pt-2">
        <label class="flex items-start gap-3 p-4 rounded-xl border border-[#E2DBCB] hover:bg-[#f7f3ea]/50 transition-colors cursor-pointer"
               :class="errors['certify_authorship'] ? 'border-[#E8112D] bg-[#fff8f8]' : ''">
            <input type="checkbox" name="certify_authorship" value="1" x-model="formData.certify_authorship" @change="clearError('certify_authorship')" class="w-5 h-5 mt-0.5 text-[#063527] rounded-md border-[#c0c8c3] focus:ring-[#006c4f]">
            <span class="text-sm font-medium text-[#1c1c16]">
                Je certifie être le/la véritable auteur(e) ou détenteur(trice) légitime de l'invention/innovation présentée. <span class="text-[#E8112D] font-bold">*</span>
            </span>
        </label>
        <template x-if="errors['certify_authorship']">
            <p class="text-xs text-[#E8112D] font-medium pl-2" x-text="errors['certify_authorship']"></p>
        </template>

        <label class="flex items-start gap-3 p-4 rounded-xl border border-[#E2DBCB] hover:bg-[#f7f3ea]/50 transition-colors cursor-pointer"
               :class="errors['certify_originality'] ? 'border-[#E8112D] bg-[#fff8f8]' : ''">
            <input type="checkbox" name="certify_originality" value="1" x-model="formData.certify_originality" @change="clearError('certify_originality')" class="w-5 h-5 mt-0.5 text-[#063527] rounded-md border-[#c0c8c3] focus:ring-[#006c4f]">
            <span class="text-sm font-medium text-[#1c1c16]">
                Je déclare sur l'honneur que cette oeuvre est originale et n'enfreint aucun brevet, marque ou droit d'auteur tiers, et j'assume l'entière responsabilité des informations fournies. <span class="text-[#E8112D] font-bold">*</span>
            </span>
        </label>
        <template x-if="errors['certify_originality']">
            <p class="text-xs text-[#E8112D] font-medium pl-2" x-text="errors['certify_originality']"></p>
        </template>

        <label class="flex items-start gap-3 p-4 rounded-xl border border-[#E2DBCB] hover:bg-[#f7f3ea]/50 transition-colors cursor-pointer"
               :class="errors['has_accepted_certification'] ? 'border-[#E8112D] bg-[#fff8f8]' : ''">
            <input type="checkbox" name="has_accepted_certification" value="1" x-model="formData.has_accepted_certification" @change="clearError('has_accepted_certification')" class="w-5 h-5 mt-0.5 text-[#063527] rounded-md border-[#c0c8c3] focus:ring-[#006c4f]">
            <span class="text-sm font-semibold text-[#006c4f]">
                Confirmez-vous avoir lu, compris et approuvé l'ensemble de la présente certification ? <span class="text-[#E8112D] font-bold">*</span>
            </span>
        </label>
        <template x-if="errors['has_accepted_certification']">
            <p class="text-xs text-[#E8112D] font-medium pl-2" x-text="errors['has_accepted_certification']"></p>
        </template>
    </div>
</div>
