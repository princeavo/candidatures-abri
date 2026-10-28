@extends('layouts.app')

@section('title', 'Formulaire de Candidature ABRI 2026')

@section('content')
<div class="w-full" x-data="abriApplicationForm()" x-cloak>
    <!-- Top Administrative Context Banner -->
    <div class="w-full bg-[#f1eee5] border-b border-[#c0c8c3]/60 py-6 px-4 sm:px-8 lg:px-12">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div class="space-y-1.5">
                <div class="flex items-center gap-2">
                    <span class="px-2.5 py-1 rounded bg-[#0A4A35] text-white text-xs font-semibold uppercase tracking-wider">
                        Campagne 2026
                    </span>
                    <span class="text-xs text-[#52625A] font-medium">Portail National des Candidatures</span>
                </div>
                <h1 class="font-heading text-2xl sm:text-3xl font-bold text-[#001e14] tracking-tight">
                    Appel à candidatures : Inventions et innovations technologiques
                </h1>
                <p class="text-sm text-[#52625A] max-w-3xl leading-relaxed">
                    Plateforme nationale d'enregistrement pour les chercheurs, inventeurs, startups et innovateurs du Bénin. Les champs marqués d'un astérisque (<span class="text-[#E8112D] font-bold">*</span>) sont obligatoires.
                </p>
            </div>
            <div class="flex items-center gap-3 bg-white px-4 py-3 rounded-xl border border-[#E2DBCB] shadow-xs shrink-0">
                <div class="w-9 h-9 rounded-lg bg-[#063527]/10 text-[#063527] flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-xl">verified</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-[10px] uppercase tracking-wider text-[#52625A] font-semibold">Plateforme officielle</span>
                    <span class="font-heading text-xs font-bold text-[#001e14]">Session ABRI-2026</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Stepper Quick Bar -->
    <div class="lg:hidden w-full bg-white border-b border-[#E2DBCB] px-4 py-3 sticky top-0 z-40 shadow-xs">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <span class="w-7 h-7 rounded-full bg-[#063527] text-white flex items-center justify-center text-xs font-bold" x-text="currentStep"></span>
                <div class="flex flex-col">
                    <span class="text-[11px] text-[#52625A]" x-text="'Étape ' + currentStep + ' sur ' + totalSteps"></span>
                    <span class="font-heading text-sm font-bold text-[#001e14]" x-text="stepTitles[currentStep - 1]"></span>
                </div>
            </div>
            <span class="text-xs px-2.5 py-0.5 rounded-full bg-[#006c4f]/10 text-[#006c4f] font-semibold" x-text="Math.round((currentStep / totalSteps) * 100) + '%'"></span>
        </div>
        <div class="w-full bg-[#ece8df] h-1.5 rounded-full mt-2.5 overflow-hidden">
            <div class="bg-[#006c4f] h-full rounded-full transition-all duration-300" :style="'width: ' + ((currentStep / totalSteps) * 100) + '%'"></div>
        </div>
    </div>

    <!-- Main Wizard Grid Layout -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- LEFT COLUMN : Sticky Vertical Stepper -->
            <aside class="hidden lg:block lg:col-span-4 sticky top-6 space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-xs border border-[#E2DBCB]">
                    <div class="pb-5 border-b border-[#f1eee5]">
                        <span class="text-xs font-bold uppercase tracking-wider text-[#52625A]">Progression</span>
                        <h2 class="font-heading text-lg font-bold text-[#001e14] mt-1">Étapes du dossier</h2>
                    </div>
                    <div class="space-y-4 pt-5 relative">
                        <div class="absolute left-4 top-8 bottom-8 w-0.5 bg-[#f1eee5] -z-0"></div>
                        <template x-for="(title, index) in stepTitles" :key="index">
                            <div class="flex items-center gap-3 relative z-10 cursor-pointer" @click="goToStep(index + 1)">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold transition-all shrink-0"
                                     :class="{
                                         'bg-[#006c4f] text-white shadow-xs': currentStep > index + 1,
                                         'bg-[#063527] text-white ring-4 ring-[#006c4f]/20': currentStep === index + 1,
                                         'bg-[#f1eee5] text-[#52625A] border border-[#c0c8c3]': currentStep < index + 1
                                     }">
                                    <template x-if="currentStep > index + 1">
                                        <span class="material-symbols-outlined text-sm">check</span>
                                    </template>
                                    <template x-if="currentStep <= index + 1">
                                        <span x-text="index + 1"></span>
                                    </template>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[11px] font-semibold uppercase tracking-wider"
                                          :class="currentStep === index + 1 ? 'text-[#006c4f]' : 'text-[#717974]'"
                                          x-text="'Étape ' + (index + 1)"></span>
                                    <span class="text-sm font-semibold leading-snug"
                                          :class="currentStep === index + 1 ? 'text-[#001e14]' : 'text-[#52625A]'"
                                          x-text="title"></span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </aside>

            <!-- RIGHT COLUMN : Main Form Card -->
            <div class="lg:col-span-8">
                <!-- Global Step Validation Error Alert -->
                <div x-show="hasCurrentStepErrors()" x-transition class="mb-6 bg-[#ffdad6] border border-[#ba1a1a]/40 p-4 rounded-xl text-xs text-[#93000a] flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-lg shrink-0">error</span>
                    <span>Veuillez renseigner correctement tous les champs obligatoires avant de poursuivre.</span>
                </div>

                <form method="POST" action="{{ route('applications.store') }}" enctype="multipart/form-data" @submit="onFormSubmit($event)" class="bg-white p-6 sm:p-10 rounded-2xl shadow-xs border border-[#E2DBCB] space-y-8">
                    @csrf

                    <!-- Inclusions modulaires des 8 étapes -->
                    @include('applications.steps.step-1-certification')
                    @include('applications.steps.step-2-identite')
                    @include('applications.steps.step-3-recevabilite')
                    @include('applications.steps.step-4-ia')
                    @include('applications.steps.step-5-invention')
                    @include('applications.steps.step-6-validation')
                    @include('applications.steps.step-7-propriete-marche')
                    @include('applications.steps.step-8-impact-rh')

                    <!-- Bottom Navigation Buttons -->
                    <div class="pt-6 border-t border-[#f1eee5] flex items-center justify-between gap-4">
                        <button type="button"
                                x-show="currentStep > 1"
                                @click="prevStep()"
                                class="px-5 py-2.5 rounded-xl border border-[#c0c8c3] text-[#52625A] hover:bg-[#f1eee5] font-semibold text-sm transition-colors flex items-center gap-1.5 cursor-pointer">
                            <span class="material-symbols-outlined text-lg">arrow_back</span>
                            <span>Précédent</span>
                        </button>
                        <div x-show="currentStep === 1"></div>

                        <div class="flex items-center gap-3">
                            <button type="button"
                                    x-show="currentStep < totalSteps"
                                    @click="nextStep()"
                                    class="px-6 py-2.5 rounded-xl bg-[#063527] hover:bg-[#0A4A35] text-white font-semibold text-sm transition-colors flex items-center gap-2 shadow-sm cursor-pointer">
                                <span>Continuer</span>
                                <span class="material-symbols-outlined text-lg">arrow_forward</span>
                            </button>

                            <button type="submit"
                                    x-show="currentStep === totalSteps"
                                    class="px-8 py-3 rounded-xl bg-[#F2B705] hover:bg-[#e0a800] text-[#001e14] font-bold text-sm transition-colors flex items-center gap-2 shadow-sm cursor-pointer">
                                <span class="material-symbols-outlined text-lg">send</span>
                                <span>Soumettre la candidature</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function abriApplicationForm() {
    return {
        currentStep: 1,
        totalSteps: 8,
        stepTitles: [
            "Déclaration sur l'honneur",
            "Identité et éligibilité",
            "Équipe et recevabilité",
            "Utilisation de l'IA",
            "Information sur l'invention",
            "Validation et traction",
            "Propriété intellectuelle et marché",
            "Impact et confirmation"
        ],
        formData: {
            // Étape 1
            certify_authorship: false,
            certify_originality: false,
            has_accepted_certification: false,

            // Étape 2
            candidacy_type: 'individual',
            structure_type: '',
            first_name: '',
            last_name: '',
            gender: '',
            date_of_birth: '',
            nationality: 'Béninoise',
            country_of_residence: 'Bénin',
            country_of_residence_other: '',
            phone: '',
            email: '',
            profession: '',
            organization: '',
            department: '',
            municipality: '',
            benefits_beninese_population: '',
            cofounders_outside_benin_pct: '',
            members_outside_benin_pct: '',

            // Étape 3
            consortium_name: '',
            trl_stage: '',
            authorization_status: 'ni_lun_ni_lautre',
            uses_traditional_knowledge: false,
            traditional_knowledge_consent: 'obtenu',

            // Étape 4
            used_ai_tools: '',

            // Étape 5
            invention_name: '',
            invention_type: '',
            sector: '',
            sector_other: '',
            summary: '',
            problem_statement: '',
            socioeconomic_importance: '',
            benin_context_relevance: '',
            originality_description: '',
            differentiation_from_existing: '',
            added_value: '',
            resources_access: '',

            // Étape 6
            scientific_validation_summary: '',
            real_world_testing_summary: '',
            awards_received: '',
            awards_date: '',
            support_program: '',

            // Étape 7
            valorization_potential: '',
            unit_price: '',
            market_size_competition: '',
            market_strategy: '',

            // Étape 8
            declaredTeamSize: '1',
            monetization_strategy: '',
            revenue_amount: '',
            social_impact_summary: '',
            environmental_impact_details: '',
            replicability: '',
            transferability: '',
            long_term_viability: ''
        },
        teamMembers: [
            { name: '', gender: '', role: '', capital_pct: '' }
        ],
        hrCategories: {
            secondary: { label: "A. Études secondaires ou inférieures", men: 0, women: 0 },
            postsec:   { label: "B. Études postsecondaires (Bac+2)", men: 0, women: 0 },
            stem:      { label: "C. Sciences dures et recherche", men: 0, women: 0 },
            engineering: { label: "D. Ingénierie et technologies", men: 0, women: 0 },
            arts:      { label: "E. Sciences humaines et lettres", men: 0, women: 0 },
            business:  { label: "F. Gestion et management", men: 0, women: 0 }
        },
        totalMen: 0,
        totalWomen: 0,
        grandTotal: 0,
        errors: {},

        init() {
            const saved = localStorage.getItem('abri_candidature_draft_2026');
            if (saved) {
                try {
                    const parsed = JSON.parse(saved);
                    this.formData = Object.assign(this.formData, parsed.formData || {});
                    if (parsed.currentStep) this.currentStep = parsed.currentStep;
                    if (parsed.teamMembers && Array.isArray(parsed.teamMembers)) this.teamMembers = parsed.teamMembers;
                } catch (e) {}
            }
            this.updateHrTotal();
        },

        addTeamMember() {
            this.teamMembers.push({ name: '', gender: '', role: '', capital_pct: '' });
        },

        clearError(field) {
            if (this.errors[field]) {
                delete this.errors[field];
            }
        },

        hasCurrentStepErrors() {
            return Object.keys(this.errors).length > 0;
        },

        validateStep(step) {
            this.errors = {};
            const d = this.formData;

            if (step === 1) {
                if (!d.certify_authorship) {
                    this.errors['certify_authorship'] = "Veuillez certifier être l'auteur(e) ou détenteur(trice) légitime.";
                }
                if (!d.certify_originality) {
                    this.errors['certify_originality'] = "Veuillez déclarer sur l'honneur l'originalité de l'oeuvre.";
                }
                if (!d.has_accepted_certification) {
                    this.errors['has_accepted_certification'] = "Veuillez confirmer la lecture et l'approbation de la certification.";
                }
            } else if (step === 2) {
                if (d.candidacy_type === 'corporate' && !d.structure_type) {
                    this.errors['structure_type'] = "Veuillez sélectionner le type de structure.";
                }
                if (!d.last_name || !d.last_name.trim()) {
                    this.errors['last_name'] = "Le nom est obligatoire.";
                }
                if (!d.first_name || !d.first_name.trim()) {
                    this.errors['first_name'] = "Le prénom est obligatoire.";
                }
                if (!d.gender) {
                    this.errors['gender'] = "Veuillez sélectionner le sexe.";
                }
                if (!d.date_of_birth) {
                    this.errors['date_of_birth'] = "La date de naissance est obligatoire.";
                }
                if (!d.nationality) {
                    this.errors['nationality'] = "La nationalité est obligatoire.";
                }
                if (!d.country_of_residence) {
                    this.errors['country_of_residence'] = "Le pays de résidence est obligatoire.";
                } else if (d.country_of_residence === 'Autre' && (!d.country_of_residence_other || !d.country_of_residence_other.trim())) {
                    this.errors['country_of_residence_other'] = "Veuillez préciser le pays de résidence.";
                }
                if (!d.phone || !d.phone.trim()) {
                    this.errors['phone'] = "Le numéro de téléphone est obligatoire.";
                }
                if (!d.email || !d.email.trim()) {
                    this.errors['email'] = "L'adresse email est obligatoire.";
                } else {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(d.email.trim())) {
                        this.errors['email'] = "Format d'adresse email invalide.";
                    }
                }
                if (!d.benefits_beninese_population) {
                    this.errors['benefits_beninese_population'] = "Veuillez indiquer si l'invention bénéficie en priorité aux populations béninoises.";
                }
            } else if (step === 3) {
                if (!d.trl_stage) {
                    this.errors['trl_stage'] = "Veuillez sélectionner le stade de maturité de votre invention.";
                }
            } else if (step === 4) {
                if (!d.used_ai_tools) {
                    this.errors['used_ai_tools'] = "Veuillez indiquer si vous avez utilisé des outils d'IA pour ce dossier.";
                }
            } else if (step === 5) {
                if (!d.invention_name || !d.invention_name.trim()) {
                    this.errors['invention_name'] = "Le nom de l'invention est obligatoire.";
                }
                if (!d.invention_type) {
                    this.errors['invention_type'] = "Veuillez sélectionner le type d'invention.";
                }
                if (!d.sector) {
                    this.errors['sector'] = "Veuillez choisir un secteur prioritaire.";
                } else if (d.sector === 'Autre' && (!d.sector_other || !d.sector_other.trim())) {
                    this.errors['sector_other'] = "Veuillez préciser le secteur.";
                }
                if (!d.summary || !d.summary.trim()) {
                    this.errors['summary'] = "Le résumé synthétique est obligatoire.";
                }
                if (!d.problem_statement || !d.problem_statement.trim()) {
                    this.errors['problem_statement'] = "Veuillez décrire le problème résolu (Q1).";
                }
                if (!d.socioeconomic_importance || !d.socioeconomic_importance.trim()) {
                    this.errors['socioeconomic_importance'] = "Veuillez renseigner l'importance socioéconomique (Q2).";
                }
                if (!d.benin_context_relevance || !d.benin_context_relevance.trim()) {
                    this.errors['benin_context_relevance'] = "Veuillez préciser l'adaptation au contexte béninois (Q3).";
                }
                if (!d.originality_description || !d.originality_description.trim()) {
                    this.errors['originality_description'] = "Veuillez expliciter l'originalité de l'invention (Q4).";
                }
                if (!d.differentiation_from_existing || !d.differentiation_from_existing.trim()) {
                    this.errors['differentiation_from_existing'] = "Veuillez décrire les particularités vs l'existant (Q5).";
                }
                if (!d.added_value || !d.added_value.trim()) {
                    this.errors['added_value'] = "Veuillez décrire la valeur ajoutée (Q6).";
                }
            }

            return Object.keys(this.errors).length === 0;
        },

        goToStep(step) {
            if (step > this.currentStep) {
                // If skipping ahead, validate intermediate step first
                if (!this.validateStep(this.currentStep)) {
                    this.scrollToFirstError();
                    return;
                }
            }
            if (step >= 1 && step <= this.totalSteps) {
                this.errors = {};
                this.currentStep = step;
                this.saveDraft();
                window.scrollTo({ top: 150, behavior: 'smooth' });
            }
        },

        nextStep() {
            if (!this.validateStep(this.currentStep)) {
                this.scrollToFirstError();
                return;
            }

            if (this.currentStep < this.totalSteps) {
                this.errors = {};
                this.currentStep++;
                this.saveDraft();
                window.scrollTo({ top: 150, behavior: 'smooth' });
            }
        },

        prevStep() {
            if (this.currentStep > 1) {
                this.errors = {};
                this.currentStep--;
                this.saveDraft();
                window.scrollTo({ top: 150, behavior: 'smooth' });
            }
        },

        scrollToFirstError() {
            this.$nextTick(() => {
                const firstErr = document.querySelector('.border-\\[\\#E8112D\\]');
                if (firstErr) {
                    firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    if (firstErr.focus) firstErr.focus();
                } else {
                    window.scrollTo({ top: 150, behavior: 'smooth' });
                }
            });
        },

        updateHrTotal() {
            let m = 0, w = 0;
            for (let k in this.hrCategories) {
                m += Number(this.hrCategories[k].men || 0);
                w += Number(this.hrCategories[k].women || 0);
            }
            this.totalMen = m;
            this.totalWomen = w;
            this.grandTotal = m + w;
        },

        saveDraft() {
            localStorage.setItem('abri_candidature_draft_2026', JSON.stringify({
                formData: this.formData,
                currentStep: this.currentStep,
                teamMembers: this.teamMembers
            }));
        },

        onFormSubmit(e) {
            // Validate all essential steps before final send
            for (let s = 1; s <= 5; s++) {
                if (!this.validateStep(s)) {
                    e.preventDefault();
                    this.currentStep = s;
                    this.scrollToFirstError();
                    return false;
                }
            }
            localStorage.removeItem('abri_candidature_draft_2026');
        }
    };
}
</script>
@endpush
