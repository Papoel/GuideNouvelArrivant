<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* pdf/css_workbook.twig */
class __TwigTemplate_4a33d32f6707c3cb8a6772f739863589 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/css_workbook.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/css_workbook.twig"));

        // line 1
        yield "/* Reset et base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', 'Helvetica', sans-serif;
    font-size: 12px;
    line-height: 1.6;
    color: #2c384e;
    background: #ffffff;
}

/* Configuration des pages */
@page {
    size: A4;
    margin: 25mm 30mm 30mm 30mm;
}

@page :first {
    margin: 0;
}

/* Sauts de page */
.page-break {
    page-break-before: always;
}

.cover-page {
    page-break-after: always;
}

/* === STYLES DE LA PAGE DE COUVERTURE === */
.cover-page {
    height: auto;
    max-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    padding: 20px 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    page-break-inside: avoid;
}

.cover-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    border-bottom: 3px solid #3d5f9e;
    padding-bottom: 15px;
}

.company-logo, .logo-placeholder {
    margin: 0;
    padding: 0;
}

.document-title {
    text-align: center;
    flex: 1;
}

.document-title h1 {
    font-weight: bold;
    color: #3d5f9e;
    margin-bottom: 10px;
    letter-spacing: 3px;
}

.document-title .subtitle {
    font-size: 18px;
    color: #6c757d;
    font-style: italic;
}

.cover-content {
    flex: 1;
    margin: 20px 0;
}

.apprentice-info-full {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    border-left: 6px solid #3d5f9e;
}

.apprentice-info-full h2 {
    font-size: 22px;
    color: #3d5f9e;
    margin-bottom: 25px;
    font-weight: 600;
    text-align: center;
}

.info-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.info-row {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #e9ecef;
}

.info-row:last-child {
    border-bottom: none;
}

.info-row .label {
    font-weight: 600;
    color: #2c384e;
    min-width: 180px;
    font-size: 13px;
}

.info-row .value {
    color: #495057;
    text-align: right;
    flex: 1;
    font-size: 13px;
}

/* Certificat de completion */
.completion-certificate {
    margin-top: 40px;
    padding: 30px;
    background: #f8f9fa;
    border-radius: 10px;
    border: 2px solid #3d5f9e;
    text-align: center;
}

.certificate-statement {
    font-size: 16px;
    line-height: 1.8;
    color: #2c384e;
    margin-bottom: 20px;
    font-weight: 500;
}

.certificate-validation {
    font-size: 14px;
    color: #3d5f9e;
    font-weight: 600;
    font-style: italic;
}


.cover-footer {
    margin-top: 40px;
}

.generation-info {
    text-align: center;
    color: #6c757d;
    font-size: 11px;
}

/* === STYLES DE LA PAGE DE SIGNATURES === */
.signature-page {
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 0;
}

.signature-header {
    text-align: center;
    margin-bottom: 50px;
    border-bottom: 3px solid #3d5f9e;
    padding-bottom: 25px;
}

.signature-header h1 {
    font-size: 28px;
    color: #3d5f9e;
    font-weight: 600;
    margin-bottom: 15px;
}

.signature-subtitle p {
    font-size: 14px;
    color: #2c384e;
    margin-bottom: 5px;
}

.signature-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.signature-text {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    border-left: 5px solid #3d5f9e;
    margin-bottom: 40px;
}

.signature-text p {
    font-size: 14px;
    line-height: 1.7;
    color: #2c384e;
    margin-bottom: 15px;
}

.signature-text p:last-child {
    margin-bottom: 0;
}

.signatures-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 40px;
}

.signature-block-large {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    padding: 25px;
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    min-height: 120px;
}

.signature-info h4 {
    font-size: 16px;
    color: #3d5f9e;
    font-weight: 600;
    margin-bottom: 8px;
}

.signature-info p {
    font-size: 13px;
    color: #2c384e;
    margin-bottom: 3px;
}

.signature-role {
    font-style: italic;
    color: #6c757d !important;
    font-size: 11px !important;
}

.signature-area {
    text-align: center;
    min-width: 200px;
}

.signature-line-large {
    height: 2px;
    background: #2c384e;
    width: 200px;
    margin-bottom: 10px;
}

.signature-label {
    font-size: 11px;
    color: #6c757d;
    font-style: italic;
}

.signature-footer {
    text-align: center;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e9ecef;
}

.signature-footer p {
    font-size: 11px;
    color: #6c757d;
}

/* === STYLES DES PAGES DE CONTENU === */
.content-page {
    min-height: 100vh;
    padding: 40px 0 20px 0;
}

.page-header {
    margin-bottom: 30px;
    border-bottom: 2px solid #3d5f9e;
    padding-bottom: 15px;
}

.page-header h1 {
    font-size: 24px;
    color: #3d5f9e;
    font-weight: 600;
    margin-bottom: 8px;
}

.header-info {
    color: #6c757d;
    font-size: 11px;
    font-style: italic;
}

.content-section {
    margin-bottom: 30px;
}

.content-section h2 {
    font-size: 18px;
    color: #2c384e;
    margin-bottom: 20px;
    font-weight: 600;
}

/* Sections de domaines de compétences */
.domain-section {
    margin-bottom: 30px;
    background: white;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    overflow: hidden;
    page-break-inside: avoid;
    break-inside: avoid;
}

.domain-section h3 {
    background: #3d5f9e;
    color: white;
    padding: 12px 20px;
    margin: 0;
    font-size: 14px;
    font-weight: 600;
}

.skills-grid {
    padding: 20px;
    display: grid;
    grid-template-columns: 1fr;
    gap: 15px;
}

.skill-item {
    padding: 15px;
    border: 1px solid #e9ecef;
    border-radius: 6px;
    background: #f8f9fa;
    page-break-inside: avoid;
    break-inside: avoid;
}

.skill-item.completed {
    background: #d4edda;
    border-color: #c3e6cb;
}

.skill-item.pending {
    background: #fff3cd;
    border-color: #ffeaa7;
}

.skill-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.skill-name {
    font-weight: 600;
    color: #2c384e;
    font-size: 13px;
}

.skill-status {
    font-size: 11px;
    font-weight: 500;
}

.skill-item.completed .skill-status {
    color: #155724;
}

.skill-item.pending .skill-status {
    color: #856404;
}

.skill-description {
    font-size: 11px;
    color: #495057;
    margin-bottom: 5px;
    line-height: 1.4;
}

.completion-date {
    font-size: 10px;
    color: #6c757d;
    font-style: italic;
}

/* Timeline des actions */
.actions-timeline {
    position: relative;
    padding-left: 30px;
}

.actions-timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #3d5f9e 0%, #e9ecef 100%);
    border-radius: 1px;
}

.action-item {
    display: flex;
    align-items: flex-start;
    gap: 25px;
    margin-bottom: 30px;
    padding: 25px;
    background: white;
    border-radius: 10px;
    border-left: 5px solid #e9ecef;
    box-shadow: 0 3px 8px rgba(0,0,0,0.08);
    page-break-inside: avoid;
    position: relative;
    margin-left: -30px;
    padding-left: 55px;
}

.action-item::before {
    content: '';
    position: absolute;
    left: 10px;
    top: 35px;
    width: 10px;
    height: 10px;
    background: #e9ecef;
    border-radius: 50%;
    border: 2px solid white;
    box-shadow: 0 0 0 2px #e9ecef;
}

.action-item.completed {
    border-left-color: #28a745;
    background: linear-gradient(135deg, #ffffff 0%, #f8fff9 100%);
}

.action-item.completed::before {
    background: #28a745;
    box-shadow: 0 0 0 2px #28a745;
}

.action-item.in_progress {
    border-left-color: #ffc107;
    background: linear-gradient(135deg, #ffffff 0%, #fffef8 100%);
}

.action-item.in_progress::before {
    background: #ffc107;
    box-shadow: 0 0 0 2px #ffc107;
}

.action-item.pending {
    border-left-color: #6c757d;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
}

.action-item.pending::before {
    background: #6c757d;
    box-shadow: 0 0 0 2px #6c757d;
}

.action-date {
    min-width: 100px;
    font-size: 11px;
    color: #2c384e;
    font-weight: 600;
    text-align: center;
    padding: 8px 12px;
    background: #f8f9fa;
    border-radius: 6px;
    border: 1px solid #e9ecef;
    height: fit-content;
}

.action-content {
    flex: 1;
}

.action-content h4 {
    font-size: 15px;
    color: #2c384e;
    margin-bottom: 12px;
    font-weight: 600;
    line-height: 1.3;
}

.action-description {
    font-size: 12px;
    color: #495057;
    margin-bottom: 15px;
    line-height: 1.5;
}

.action-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 15px;
    align-items: center;
}

.action-status-badge {
    font-size: 11px;
    padding: 6px 12px;
    border-radius: 20px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-completed {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.status-in_progress {
    background: #fff3cd;
    color: #856404;
    border: 1px solid #ffeaa7;
}

.status-pending {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.action-skill {
    font-size: 11px;
    color: #6c757d;
    font-style: italic;
    background: #f8f9fa;
    padding: 4px 8px;
    border-radius: 12px;
    border: 1px solid #e9ecef;
}

.mentor-comment {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border-left: 4px solid #3d5f9e;
    margin-top: 15px;
}

.mentor-comment strong {
    font-size: 12px;
    color: #3d5f9e;
    font-weight: 600;
}

.mentor-comment p {
    font-size: 12px;
    color: #495057;
    margin-top: 8px;
    line-height: 1.5;
}

/* Section d'évaluation */
.evaluation-summary {
    background: white;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #e9ecef;
    margin-bottom: 25px;
}

.summary-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-top: 15px;
}

.summary-item {
    text-align: center;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 6px;
}

.summary-label {
    font-size: 10px;
    color: #6c757d;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
}

.summary-value {
    font-size: 16px;
    font-weight: bold;
    color: #3d5f9e;
}

.comments-section {
    background: white;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.comment-box,
.recommendations {
    margin-bottom: 20px;
}

.comment-box h4,
.recommendations h4 {
    font-size: 14px;
    color: #3d5f9e;
    margin-bottom: 12px;
    font-weight: 600;
}

.comment-content,
.recommendation-content {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 6px;
    border-left: 4px solid #3d5f9e;
}

.comment-content p,
.recommendation-content p {
    font-size: 11px;
    color: #495057;
    margin-bottom: 8px;
    line-height: 1.5;
}

.recommendation-content p:last-child {
    margin-bottom: 0;
}

/* Messages d'absence de données */
.no-data {
    text-align: center;
    padding: 40px 20px;
    color: #6c757d;
    font-style: italic;
    background: #f8f9fa;
    border-radius: 8px;
    border: 1px dashed #dee2e6;
}

/* Optimisations pour l'impression PDF */
@media print {
    body {
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
    }
    
    .cover-page,
    .content-page {
        break-inside: avoid;
    }
    
    .domain-section,
    .action-item,
    .skill-item {
        break-inside: avoid;
        page-break-inside: avoid;
    }
    
    .skill-header,
    .skill-description,
    .completion-date {
        break-inside: avoid;
        page-break-inside: avoid;
    }
    
    h1, h2, h3, h4 {
        break-after: avoid;
        page-break-after: avoid;
    }
}

/* Styles responsifs pour différentes tailles */
@media (max-width: 210mm) {
    .cover-content {
        flex-direction: column;
        gap: 20px;
    }
    
    .signatures {
        flex-direction: column;
        gap: 15px;
    }
    
    .summary-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
}";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pdf/css_workbook.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("/* Reset et base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', 'Helvetica', sans-serif;
    font-size: 12px;
    line-height: 1.6;
    color: #2c384e;
    background: #ffffff;
}

/* Configuration des pages */
@page {
    size: A4;
    margin: 25mm 30mm 30mm 30mm;
}

@page :first {
    margin: 0;
}

/* Sauts de page */
.page-break {
    page-break-before: always;
}

.cover-page {
    page-break-after: always;
}

/* === STYLES DE LA PAGE DE COUVERTURE === */
.cover-page {
    height: auto;
    max-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    padding: 20px 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    page-break-inside: avoid;
}

.cover-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    border-bottom: 3px solid #3d5f9e;
    padding-bottom: 15px;
}

.company-logo, .logo-placeholder {
    margin: 0;
    padding: 0;
}

.document-title {
    text-align: center;
    flex: 1;
}

.document-title h1 {
    font-weight: bold;
    color: #3d5f9e;
    margin-bottom: 10px;
    letter-spacing: 3px;
}

.document-title .subtitle {
    font-size: 18px;
    color: #6c757d;
    font-style: italic;
}

.cover-content {
    flex: 1;
    margin: 20px 0;
}

.apprentice-info-full {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    border-left: 6px solid #3d5f9e;
}

.apprentice-info-full h2 {
    font-size: 22px;
    color: #3d5f9e;
    margin-bottom: 25px;
    font-weight: 600;
    text-align: center;
}

.info-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.info-row {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #e9ecef;
}

.info-row:last-child {
    border-bottom: none;
}

.info-row .label {
    font-weight: 600;
    color: #2c384e;
    min-width: 180px;
    font-size: 13px;
}

.info-row .value {
    color: #495057;
    text-align: right;
    flex: 1;
    font-size: 13px;
}

/* Certificat de completion */
.completion-certificate {
    margin-top: 40px;
    padding: 30px;
    background: #f8f9fa;
    border-radius: 10px;
    border: 2px solid #3d5f9e;
    text-align: center;
}

.certificate-statement {
    font-size: 16px;
    line-height: 1.8;
    color: #2c384e;
    margin-bottom: 20px;
    font-weight: 500;
}

.certificate-validation {
    font-size: 14px;
    color: #3d5f9e;
    font-weight: 600;
    font-style: italic;
}


.cover-footer {
    margin-top: 40px;
}

.generation-info {
    text-align: center;
    color: #6c757d;
    font-size: 11px;
}

/* === STYLES DE LA PAGE DE SIGNATURES === */
.signature-page {
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 0;
}

.signature-header {
    text-align: center;
    margin-bottom: 50px;
    border-bottom: 3px solid #3d5f9e;
    padding-bottom: 25px;
}

.signature-header h1 {
    font-size: 28px;
    color: #3d5f9e;
    font-weight: 600;
    margin-bottom: 15px;
}

.signature-subtitle p {
    font-size: 14px;
    color: #2c384e;
    margin-bottom: 5px;
}

.signature-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.signature-text {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    border-left: 5px solid #3d5f9e;
    margin-bottom: 40px;
}

.signature-text p {
    font-size: 14px;
    line-height: 1.7;
    color: #2c384e;
    margin-bottom: 15px;
}

.signature-text p:last-child {
    margin-bottom: 0;
}

.signatures-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 40px;
}

.signature-block-large {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    padding: 25px;
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    min-height: 120px;
}

.signature-info h4 {
    font-size: 16px;
    color: #3d5f9e;
    font-weight: 600;
    margin-bottom: 8px;
}

.signature-info p {
    font-size: 13px;
    color: #2c384e;
    margin-bottom: 3px;
}

.signature-role {
    font-style: italic;
    color: #6c757d !important;
    font-size: 11px !important;
}

.signature-area {
    text-align: center;
    min-width: 200px;
}

.signature-line-large {
    height: 2px;
    background: #2c384e;
    width: 200px;
    margin-bottom: 10px;
}

.signature-label {
    font-size: 11px;
    color: #6c757d;
    font-style: italic;
}

.signature-footer {
    text-align: center;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e9ecef;
}

.signature-footer p {
    font-size: 11px;
    color: #6c757d;
}

/* === STYLES DES PAGES DE CONTENU === */
.content-page {
    min-height: 100vh;
    padding: 40px 0 20px 0;
}

.page-header {
    margin-bottom: 30px;
    border-bottom: 2px solid #3d5f9e;
    padding-bottom: 15px;
}

.page-header h1 {
    font-size: 24px;
    color: #3d5f9e;
    font-weight: 600;
    margin-bottom: 8px;
}

.header-info {
    color: #6c757d;
    font-size: 11px;
    font-style: italic;
}

.content-section {
    margin-bottom: 30px;
}

.content-section h2 {
    font-size: 18px;
    color: #2c384e;
    margin-bottom: 20px;
    font-weight: 600;
}

/* Sections de domaines de compétences */
.domain-section {
    margin-bottom: 30px;
    background: white;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    overflow: hidden;
    page-break-inside: avoid;
    break-inside: avoid;
}

.domain-section h3 {
    background: #3d5f9e;
    color: white;
    padding: 12px 20px;
    margin: 0;
    font-size: 14px;
    font-weight: 600;
}

.skills-grid {
    padding: 20px;
    display: grid;
    grid-template-columns: 1fr;
    gap: 15px;
}

.skill-item {
    padding: 15px;
    border: 1px solid #e9ecef;
    border-radius: 6px;
    background: #f8f9fa;
    page-break-inside: avoid;
    break-inside: avoid;
}

.skill-item.completed {
    background: #d4edda;
    border-color: #c3e6cb;
}

.skill-item.pending {
    background: #fff3cd;
    border-color: #ffeaa7;
}

.skill-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.skill-name {
    font-weight: 600;
    color: #2c384e;
    font-size: 13px;
}

.skill-status {
    font-size: 11px;
    font-weight: 500;
}

.skill-item.completed .skill-status {
    color: #155724;
}

.skill-item.pending .skill-status {
    color: #856404;
}

.skill-description {
    font-size: 11px;
    color: #495057;
    margin-bottom: 5px;
    line-height: 1.4;
}

.completion-date {
    font-size: 10px;
    color: #6c757d;
    font-style: italic;
}

/* Timeline des actions */
.actions-timeline {
    position: relative;
    padding-left: 30px;
}

.actions-timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #3d5f9e 0%, #e9ecef 100%);
    border-radius: 1px;
}

.action-item {
    display: flex;
    align-items: flex-start;
    gap: 25px;
    margin-bottom: 30px;
    padding: 25px;
    background: white;
    border-radius: 10px;
    border-left: 5px solid #e9ecef;
    box-shadow: 0 3px 8px rgba(0,0,0,0.08);
    page-break-inside: avoid;
    position: relative;
    margin-left: -30px;
    padding-left: 55px;
}

.action-item::before {
    content: '';
    position: absolute;
    left: 10px;
    top: 35px;
    width: 10px;
    height: 10px;
    background: #e9ecef;
    border-radius: 50%;
    border: 2px solid white;
    box-shadow: 0 0 0 2px #e9ecef;
}

.action-item.completed {
    border-left-color: #28a745;
    background: linear-gradient(135deg, #ffffff 0%, #f8fff9 100%);
}

.action-item.completed::before {
    background: #28a745;
    box-shadow: 0 0 0 2px #28a745;
}

.action-item.in_progress {
    border-left-color: #ffc107;
    background: linear-gradient(135deg, #ffffff 0%, #fffef8 100%);
}

.action-item.in_progress::before {
    background: #ffc107;
    box-shadow: 0 0 0 2px #ffc107;
}

.action-item.pending {
    border-left-color: #6c757d;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
}

.action-item.pending::before {
    background: #6c757d;
    box-shadow: 0 0 0 2px #6c757d;
}

.action-date {
    min-width: 100px;
    font-size: 11px;
    color: #2c384e;
    font-weight: 600;
    text-align: center;
    padding: 8px 12px;
    background: #f8f9fa;
    border-radius: 6px;
    border: 1px solid #e9ecef;
    height: fit-content;
}

.action-content {
    flex: 1;
}

.action-content h4 {
    font-size: 15px;
    color: #2c384e;
    margin-bottom: 12px;
    font-weight: 600;
    line-height: 1.3;
}

.action-description {
    font-size: 12px;
    color: #495057;
    margin-bottom: 15px;
    line-height: 1.5;
}

.action-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 15px;
    align-items: center;
}

.action-status-badge {
    font-size: 11px;
    padding: 6px 12px;
    border-radius: 20px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-completed {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.status-in_progress {
    background: #fff3cd;
    color: #856404;
    border: 1px solid #ffeaa7;
}

.status-pending {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.action-skill {
    font-size: 11px;
    color: #6c757d;
    font-style: italic;
    background: #f8f9fa;
    padding: 4px 8px;
    border-radius: 12px;
    border: 1px solid #e9ecef;
}

.mentor-comment {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border-left: 4px solid #3d5f9e;
    margin-top: 15px;
}

.mentor-comment strong {
    font-size: 12px;
    color: #3d5f9e;
    font-weight: 600;
}

.mentor-comment p {
    font-size: 12px;
    color: #495057;
    margin-top: 8px;
    line-height: 1.5;
}

/* Section d'évaluation */
.evaluation-summary {
    background: white;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #e9ecef;
    margin-bottom: 25px;
}

.summary-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-top: 15px;
}

.summary-item {
    text-align: center;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 6px;
}

.summary-label {
    font-size: 10px;
    color: #6c757d;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
}

.summary-value {
    font-size: 16px;
    font-weight: bold;
    color: #3d5f9e;
}

.comments-section {
    background: white;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.comment-box,
.recommendations {
    margin-bottom: 20px;
}

.comment-box h4,
.recommendations h4 {
    font-size: 14px;
    color: #3d5f9e;
    margin-bottom: 12px;
    font-weight: 600;
}

.comment-content,
.recommendation-content {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 6px;
    border-left: 4px solid #3d5f9e;
}

.comment-content p,
.recommendation-content p {
    font-size: 11px;
    color: #495057;
    margin-bottom: 8px;
    line-height: 1.5;
}

.recommendation-content p:last-child {
    margin-bottom: 0;
}

/* Messages d'absence de données */
.no-data {
    text-align: center;
    padding: 40px 20px;
    color: #6c757d;
    font-style: italic;
    background: #f8f9fa;
    border-radius: 8px;
    border: 1px dashed #dee2e6;
}

/* Optimisations pour l'impression PDF */
@media print {
    body {
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
    }
    
    .cover-page,
    .content-page {
        break-inside: avoid;
    }
    
    .domain-section,
    .action-item,
    .skill-item {
        break-inside: avoid;
        page-break-inside: avoid;
    }
    
    .skill-header,
    .skill-description,
    .completion-date {
        break-inside: avoid;
        page-break-inside: avoid;
    }
    
    h1, h2, h3, h4 {
        break-after: avoid;
        page-break-after: avoid;
    }
}

/* Styles responsifs pour différentes tailles */
@media (max-width: 210mm) {
    .cover-content {
        flex-direction: column;
        gap: 20px;
    }
    
    .signatures {
        flex-direction: column;
        gap: 15px;
    }
    
    .summary-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
}", "pdf/css_workbook.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/pdf/css_workbook.twig");
    }
}
