<template>
  <Layout class="bg-[#edf1f7]" style="background-color: #edf1f7">
    <Head>
      <title>Rapport Hebdomadaire Tuteur · Guide du Nouvel Arrivant</title>
    </Head>

    <Preheader
      >3 modules en attente · Action requise pour Jean Martin</Preheader
    >

    <!-- ════════════════════════════════════════════════════════════
         OUTER PADDING + CARD CONTAINER
    ════════════════════════════════════════════════════════════ -->
    <Container
      class="max-w-[600px] rounded-[20px] bg-white py-10"
      style="background-color: #ffffff; border-radius: 20px; overflow: hidden"
    >
      <!-- ────────────────────────────────────────────────────────
           TOP ACCENT BAR — Brand blue strip
      ────────────────────────────────────────────────────────── -->
      <Section
        bgcolor="#3d5f9e"
        class="bg-[#3d5f9e] px-0 py-0"
        style="background-color: #3d5f9e; padding: 0"
      >
        <Row>
          <Column
            style="
              height: 5px;
              line-height: 5px;
              font-size: 5px;
              background-color: #3d5f9e;
            "
            bgcolor="#3d5f9e"
          >
            &nbsp;
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           1. HEADER — Logo + App title + Date badge
      ────────────────────────────────────────────────────────── -->
      <Section
        class="bg-white px-[36px] py-[22px]"
        style="
          background-color: #ffffff;
          padding: 22px 36px;
          border-bottom: 1px solid #e8edf5;
        "
      >
        <Row>
          <!-- Logo -->
          <Column
            class="w-[58px] text-center align-middle"
            style="
              width: 58px;
              vertical-align: middle;
              text-align: center;
              padding-right: 16px;
              border-right: 2px solid #e8edf5;
            "
          >
            <Img
              src="/logo.png"
              width="36"
              alt="EDF"
              style="
                display: block;
                max-height: 30px;
                width: auto;
                margin: 0 auto;
              "
            />
          </Column>
          <!-- App title -->
          <Column
            class="pl-[16px] align-middle"
            style="padding-left: 16px; vertical-align: middle"
          >
            <Heading
              level="1"
              class="m-0 text-[19px] font-bold text-[#1e2d4e]"
              style="
                margin: 0 0 2px;
                font-size: 19px;
                font-weight: 700;
                color: #1e2d4e;
                letter-spacing: -0.2px;
                line-height: 1.2;
              "
            >
              Guide du Nouvel Arrivant
            </Heading>
            <Text
              class="m-0 text-[12px] text-[#8898aa]"
              style="
                margin: 0;
                font-size: 12px;
                color: #8898aa;
                letter-spacing: 0.2px;
              "
            >
              Carnets de compagnonnage · Rapport Tuteur
            </Text>
          </Column>
          <!-- Week badge -->
          <Column
            class="w-[80px] text-right align-middle"
            style="width: 80px; vertical-align: middle; text-align: right"
          >
            <div
              style="
                display: inline-block;
                background-color: #f0f4fb;
                border: 1px solid #d6e0f0;
                border-radius: 8px;
                padding: 6px 10px;
                text-align: center;
              "
            >
              <div
                style="
                  font-size: 9px;
                  font-weight: 700;
                  color: #3d5f9e;
                  text-transform: uppercase;
                  letter-spacing: 0.8px;
                  font-family: Arial, sans-serif;
                  white-space: nowrap;
                "
              >
                Mercredi
              </div>
              <div
                style="
                  font-size: 11px;
                  font-weight: 600;
                  color: #1e2d4e;
                  font-family: Arial, sans-serif;
                  margin-top: 1px;
                "
              >
                Sem. 32
              </div>
            </div>
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           2. HERO BANNER — Bold blue with title + badge
      ────────────────────────────────────────────────────────── -->
      <Section
        bgcolor="#2c4a80"
        class="bg-[#2c4a80] px-0 py-0"
        style="background-color: #2c4a80; padding: 0"
      >
        <!-- Inner gradient simulation: lighter stripe on top via two stacked rows -->
        <Row>
          <Column
            bgcolor="#3d5f9e"
            style="
              background-color: #3d5f9e;
              padding: 28px 36px 22px;
              vertical-align: middle;
              text-align: center;
            "
          >
            <!-- Overline chip -->
            <div
              style="
                display: inline-block;
                background-color: rgba(255, 255, 255, 0.15);
                border: 1px solid rgba(255, 255, 255, 0.25);
                border-radius: 30px;
                padding: 4px 14px;
                margin-bottom: 14px;
              "
            >
              <span
                style="
                  font-size: 10px;
                  font-weight: 700;
                  color: rgba(255, 255, 255, 0.9);
                  text-transform: uppercase;
                  letter-spacing: 1.2px;
                  font-family: Arial, sans-serif;
                "
                >Validation requise</span
              >
            </div>

            <Heading
              level="2"
              class="m-0 text-[32px] font-bold text-white"
              style="
                margin: 0 0 8px;
                font-size: 32px;
                font-weight: 800;
                color: #ffffff;
                letter-spacing: -0.5px;
                line-height: 1.15;
              "
            >
              À valider
            </Heading>
            <Text
              class="m-0 text-[15px]"
              style="
                margin: 0;
                font-size: 15px;
                color: rgba(255, 255, 255, 0.8);
                line-height: 1.5;
              "
            >
              Modules en attente dans le carnet de compagnonnage
            </Text>
          </Column>
        </Row>
        <!-- Dark bottom stripe for depth -->
        <Row>
          <Column
            bgcolor="#2c4a80"
            style="
              background-color: #2c4a80;
              padding: 14px 36px 18px;
              vertical-align: middle;
              text-align: center;
            "
          >
            <table
              role="presentation"
              cellpadding="0"
              cellspacing="0"
              border="0"
              align="center"
              style="border-collapse: collapse"
            >
              <tr>
                <!-- Status dot -->
                <td
                  width="8"
                  height="8"
                  bgcolor="#4ade80"
                  style="
                    width: 8px;
                    height: 8px;
                    background-color: #4ade80;
                    border-radius: 50%;
                    vertical-align: middle;
                    font-size: 0;
                    line-height: 0;
                  "
                >
                  &nbsp;
                </td>
                <td
                  style="
                    padding-left: 8px;
                    vertical-align: middle;
                    color: rgba(255, 255, 255, 0.75);
                    font-size: 12px;
                    font-weight: 500;
                    font-family: Arial, sans-serif;
                    white-space: nowrap;
                    letter-spacing: 0.3px;
                  "
                >
                  Action requise · Semaine en cours
                </td>
              </tr>
            </table>
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           3. GREETING + URGENCY
      ────────────────────────────────────────────────────────── -->
      <Section
        class="bg-white px-[36px] py-[26px]"
        style="
          background-color: #ffffff;
          padding: 26px 36px;
          border-bottom: 1px solid #f0f4fb;
        "
      >
        <Row>
          <!-- Greeting text -->
          <Column class="align-middle" style="vertical-align: middle">
            <Text
              class="m-0 text-[13px] text-[#8898aa] uppercase"
              style="
                margin: 0 0 6px;
                font-size: 11px;
                font-weight: 700;
                color: #8898aa;
                text-transform: uppercase;
                letter-spacing: 1.2px;
              "
            >
              Bonjour
            </Text>
            <Heading
              level="2"
              class="m-0 text-[24px] font-bold text-[#1e2d4e]"
              style="
                margin: 0;
                font-size: 24px;
                font-weight: 800;
                color: #1e2d4e;
                letter-spacing: -0.3px;
                line-height: 1.2;
              "
            >
              Sophie Lefebvre
            </Heading>
          </Column>
          <!-- Urgency pill -->
          <Column
            class="w-[115px] text-right align-middle"
            style="width: 115px; text-align: right; vertical-align: middle"
          >
            <!--
              Levels:
                urgent    → bg #fee2e2, text #b91c1c
                important → bg #fff7ed, text #c2410c
                normal    → bg #dcfce7, text #15803d
            -->
            <div
              style="
                display: inline-block;
                background-color: #fff7ed;
                border: 1.5px solid #fed7aa;
                border-radius: 20px;
                padding: 6px 14px;
              "
            >
              <span
                style="
                  font-size: 11px;
                  font-weight: 700;
                  color: #c2410c;
                  text-transform: uppercase;
                  letter-spacing: 0.8px;
                  font-family: Arial, sans-serif;
                  white-space: nowrap;
                "
              >
                ⚡ Important
              </span>
            </div>
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           4. STATS HERO — Big bold number
      ────────────────────────────────────────────────────────── -->
      <Section
        class="bg-white px-[36px] pt-[28px] pb-[8px]"
        style="background-color: #ffffff; padding: 28px 36px 8px"
      >
        <Row>
          <Column>
            <table
              role="presentation"
              cellpadding="0"
              cellspacing="0"
              border="0"
              width="100%"
              style="border-collapse: collapse"
            >
              <tr>
                <td
                  bgcolor="#f4f7fd"
                  style="
                    background-color: #f4f7fd;
                    border: 1px solid #dce6f5;
                    border-radius: 16px;
                    padding: 24px 28px;
                    text-align: center;
                  "
                >
                  <!-- Superscript label -->
                  <div
                    style="
                      font-size: 10px;
                      font-weight: 700;
                      color: #8898aa;
                      text-transform: uppercase;
                      letter-spacing: 1.5px;
                      font-family: Arial, sans-serif;
                      margin-bottom: 10px;
                    "
                  >
                    En attente de validation
                  </div>
                  <!-- Big number -->
                  <div
                    style="
                      font-size: 64px;
                      font-weight: 900;
                      color: #2c4a80;
                      line-height: 1;
                      font-family: Arial, sans-serif;
                      letter-spacing: -2px;
                    "
                  >
                    3
                  </div>
                  <!-- Progress bar (decorative) -->
                  <table
                    role="presentation"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    align="center"
                    style="
                      border-collapse: collapse;
                      margin: 14px auto 10px;
                      width: 180px;
                    "
                  >
                    <tr>
                      <td
                        bgcolor="#3d5f9e"
                        width="108"
                        height="4"
                        style="
                          background-color: #3d5f9e;
                          border-radius: 4px 0 0 4px;
                          height: 4px;
                          width: 108px;
                          font-size: 0;
                          line-height: 0;
                        "
                      >
                        &nbsp;
                      </td>
                      <td
                        bgcolor="#dce6f5"
                        width="72"
                        height="4"
                        style="
                          background-color: #dce6f5;
                          border-radius: 0 4px 4px 0;
                          height: 4px;
                          width: 72px;
                          font-size: 0;
                          line-height: 0;
                        "
                      >
                        &nbsp;
                      </td>
                    </tr>
                  </table>
                  <!-- Sub-label -->
                  <div
                    style="
                      font-size: 13px;
                      font-weight: 500;
                      color: #5a6a85;
                      font-family: Arial, sans-serif;
                      letter-spacing: 0.1px;
                    "
                  >
                    modules · carnet de
                    <strong style="color: #2c4a80; font-weight: 700"
                      >Jean Martin</strong
                    >
                  </div>
                </td>
              </tr>
            </table>
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           5. CONTEXT LINE — Notification message
      ────────────────────────────────────────────────────────── -->
      <Section
        class="bg-white px-[36px] py-[24px]"
        style="background-color: #ffffff; padding: 24px 36px"
      >
        <Row>
          <Column>
            <table
              role="presentation"
              cellpadding="0"
              cellspacing="0"
              border="0"
              width="100%"
              style="border-collapse: collapse"
            >
              <tr>
                <td
                  bgcolor="#eef4ff"
                  style="
                    background-color: #eef4ff;
                    border-left: 4px solid #3d5f9e;
                    border-radius: 0 10px 10px 0;
                    padding: 18px 20px;
                  "
                >
                  <p
                    style="
                      margin: 0;
                      font-size: 14px;
                      color: #374151;
                      line-height: 1.65;
                      font-family: Arial, sans-serif;
                    "
                  >
                    <strong style="color: #2c4a80; font-weight: 700"
                      >Jean Martin</strong
                    >
                    attend votre validation pour progresser dans son parcours de
                    formation. Une réponse rapide est essentielle à sa
                    progression cette semaine.
                  </p>
                </td>
              </tr>
            </table>
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           6. SECTION DIVIDER — "Ce que vous devez faire"
      ────────────────────────────────────────────────────────── -->
      <Section
        class="bg-white px-[36px] py-[0px]"
        style="background-color: #ffffff; padding: 0 36px 20px"
      >
        <Row>
          <Column>
            <table
              role="presentation"
              cellpadding="0"
              cellspacing="0"
              border="0"
              width="100%"
              style="border-collapse: collapse"
            >
              <tr>
                <td style="vertical-align: middle; padding-right: 12px">
                  <div
                    style="
                      height: 1px;
                      background-color: #e8edf5;
                      font-size: 0;
                      line-height: 0;
                    "
                  >
                    &nbsp;
                  </div>
                </td>
                <td
                  style="
                    vertical-align: middle;
                    white-space: nowrap;
                    padding: 0 4px;
                  "
                >
                  <span
                    style="
                      font-size: 10px;
                      font-weight: 700;
                      color: #8898aa;
                      text-transform: uppercase;
                      letter-spacing: 1.2px;
                      font-family: Arial, sans-serif;
                    "
                  >
                    Vos actions
                  </span>
                </td>
                <td style="vertical-align: middle; padding-left: 12px">
                  <div
                    style="
                      height: 1px;
                      background-color: #e8edf5;
                      font-size: 0;
                      line-height: 0;
                    "
                  >
                    &nbsp;
                  </div>
                </td>
              </tr>
            </table>
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           7. STEP CARDS — Two action steps
      ────────────────────────────────────────────────────────── -->
      <Section
        class="bg-white px-[36px] pb-[8px]"
        style="background-color: #ffffff; padding: 0 36px 8px"
      >
        <Row>
          <Column>
            <!-- Step 1 -->
            <table
              role="presentation"
              cellpadding="0"
              cellspacing="0"
              border="0"
              width="100%"
              style="border-collapse: collapse; margin-bottom: 14px"
            >
              <tr>
                <td
                  bgcolor="#ffffff"
                  style="
                    background-color: #ffffff;
                    border: 1px solid #dce6f5;
                    border-left: 4px solid #3d5f9e;
                    border-radius: 0 12px 12px 0;
                    padding: 0;
                    overflow: hidden;
                  "
                >
                  <table
                    role="presentation"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    width="100%"
                    style="border-collapse: collapse"
                  >
                    <tr>
                      <!-- Number badge cell -->
                      <td
                        width="56"
                        bgcolor="#f4f7fd"
                        style="
                          width: 56px;
                          background-color: #f4f7fd;
                          vertical-align: top;
                          text-align: center;
                          padding: 18px 14px;
                        "
                      >
                        <div
                          style="
                            font-size: 20px;
                            font-weight: 900;
                            color: #3d5f9e;
                            font-family: Arial, sans-serif;
                            line-height: 1;
                          "
                        >
                          01
                        </div>
                      </td>
                      <!-- Content cell -->
                      <td style="vertical-align: top; padding: 16px 18px">
                        <p
                          style="
                            margin: 0 0 5px;
                            font-size: 14px;
                            font-weight: 700;
                            color: #1e2d4e;
                            font-family: Arial, sans-serif;
                            letter-spacing: -0.1px;
                          "
                        >
                          Modules en attente
                        </p>
                        <p
                          style="
                            margin: 0;
                            font-size: 13px;
                            color: #5a6a85;
                            line-height: 1.6;
                            font-family: Arial, sans-serif;
                          "
                        >
                          Trois modules sont en attente de validation dans le
                          carnet de compagnonnage.
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            <!-- Step 2 -->
            <table
              role="presentation"
              cellpadding="0"
              cellspacing="0"
              border="0"
              width="100%"
              style="border-collapse: collapse; margin-bottom: 28px"
            >
              <tr>
                <td
                  bgcolor="#ffffff"
                  style="
                    background-color: #ffffff;
                    border: 1px solid #dce6f5;
                    border-left: 4px solid #3d5f9e;
                    border-radius: 0 12px 12px 0;
                    padding: 0;
                    overflow: hidden;
                  "
                >
                  <table
                    role="presentation"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    width="100%"
                    style="border-collapse: collapse"
                  >
                    <tr>
                      <!-- Number badge cell -->
                      <td
                        width="56"
                        bgcolor="#f4f7fd"
                        style="
                          width: 56px;
                          background-color: #f4f7fd;
                          vertical-align: top;
                          text-align: center;
                          padding: 18px 14px;
                        "
                      >
                        <div
                          style="
                            font-size: 20px;
                            font-weight: 900;
                            color: #3d5f9e;
                            font-family: Arial, sans-serif;
                            line-height: 1;
                          "
                        >
                          02
                        </div>
                      </td>
                      <!-- Content cell -->
                      <td style="vertical-align: top; padding: 16px 18px">
                        <p
                          style="
                            margin: 0 0 5px;
                            font-size: 14px;
                            font-weight: 700;
                            color: #1e2d4e;
                            font-family: Arial, sans-serif;
                            letter-spacing: -0.1px;
                          "
                        >
                          Valider rapidement
                        </p>
                        <p
                          style="
                            margin: 0;
                            font-size: 13px;
                            color: #5a6a85;
                            line-height: 1.6;
                            font-family: Arial, sans-serif;
                          "
                        >
                          Une validation rapide permet à votre apprenant(e) de
                          progresser efficacement dans son parcours de
                          formation.
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           8. CTA BUTTON
      ────────────────────────────────────────────────────────── -->
      <Section
        class="bg-white px-[36px] pb-[32px]"
        style="background-color: #ffffff; padding: 0 36px 32px"
      >
        <Row>
          <Column class="text-center" style="text-align: center">
            <Button
              href="https://gna.papoel.fr/dashboard/"
              class="block w-full rounded-xl bg-[#2c4a80] py-[17px] text-[15px] font-bold text-white"
              style="
                display: block;
                width: 100%;
                background-color: #2c4a80;
                color: #ffffff;
                padding: 17px 36px;
                border-radius: 12px;
                font-weight: 700;
                font-size: 15px;
                text-decoration: none;
                letter-spacing: 0.2px;
                font-family: Arial, sans-serif;
                text-align: center;
                box-shadow: 0 4px 14px rgba(44, 74, 128, 0.35);
              "
            >
              Accéder à mon espace Tuteur →
            </Button>
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           9. TIP BOX — Motivational note
      ────────────────────────────────────────────────────────── -->
      <Section
        class="bg-[#fffbf0] px-[36px] py-[20px]"
        bgcolor="#fffbf0"
        style="
          background-color: #fffbf0;
          padding: 20px 36px;
          border-top: 1px solid #fde68a;
          border-bottom: 1px solid #fde68a;
        "
      >
        <Row>
          <Column>
            <table
              role="presentation"
              cellpadding="0"
              cellspacing="0"
              border="0"
              width="100%"
              style="border-collapse: collapse"
            >
              <tr>
                <td
                  style="
                    vertical-align: top;
                    padding-right: 14px;
                    width: 28px;
                    font-size: 18px;
                    line-height: 1.4;
                  "
                >
                  💡
                </td>
                <td style="vertical-align: top">
                  <p
                    style="
                      margin: 0;
                      font-size: 13px;
                      color: #92400e;
                      line-height: 1.65;
                      font-family: Arial, sans-serif;
                      font-style: italic;
                    "
                  >
                    Votre accompagnement est essentiel pour la progression et la
                    motivation de
                    <strong
                      style="
                        font-style: normal;
                        font-weight: 700;
                        color: #78350f;
                      "
                      >Jean Martin</strong
                    >. Chaque validation est une étape clé de son développement
                    professionnel.
                  </p>
                </td>
              </tr>
            </table>
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           10. SIGNATURE
      ────────────────────────────────────────────────────────── -->
      <Section
        class="bg-white px-[36px] py-[24px]"
        style="background-color: #ffffff; padding: 24px 36px"
      >
        <Row>
          <Column>
            <table
              role="presentation"
              cellpadding="0"
              cellspacing="0"
              border="0"
              width="100%"
              style="border-collapse: collapse"
            >
              <tr>
                <!-- Monogram avatar -->
                <td
                  width="46"
                  style="
                    width: 46px;
                    vertical-align: middle;
                    text-align: center;
                    padding-right: 14px;
                  "
                >
                  <table
                    role="presentation"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    width="46"
                    height="46"
                    bgcolor="#2c4a80"
                    style="
                      border-collapse: collapse;
                      background-color: #2c4a80;
                      border-radius: 12px;
                      width: 46px;
                      height: 46px;
                      margin: 0 auto;
                    "
                  >
                    <tr>
                      <td
                        width="46"
                        height="46"
                        align="center"
                        valign="middle"
                        style="
                          width: 46px;
                          height: 46px;
                          text-align: center;
                          vertical-align: middle;
                          color: #ffffff;
                          font-size: 11px;
                          font-weight: 800;
                          letter-spacing: 0.5px;
                          font-family: Arial, sans-serif;
                          line-height: 46px;
                        "
                      >
                        GNA
                      </td>
                    </tr>
                  </table>
                </td>
                <!-- Signature text -->
                <td style="vertical-align: middle">
                  <p
                    style="
                      margin: 0 0 2px;
                      font-size: 14px;
                      font-weight: 700;
                      color: #1e2d4e;
                      font-family: Arial, sans-serif;
                    "
                  >
                    Cordialement,
                  </p>
                  <p
                    style="
                      margin: 0;
                      font-size: 12px;
                      color: #8898aa;
                      font-family: Arial, sans-serif;
                      line-height: 1.4;
                    "
                  >
                    L'équipe Guide du Nouvel Arrivant
                  </p>
                </td>
              </tr>
            </table>
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           11. FOOTER
      ────────────────────────────────────────────────────────── -->
      <Section
        bgcolor="#f4f7fd"
        class="bg-[#f4f7fd] px-[36px] py-[24px]"
        style="
          background-color: #f4f7fd;
          padding: 24px 36px;
          border-top: 1px solid #dce6f5;
        "
      >
        <Row>
          <Column>
            <!-- Auto-send notice -->
            <table
              role="presentation"
              cellpadding="0"
              cellspacing="0"
              border="0"
              align="center"
              style="border-collapse: collapse; margin: 0 auto 20px"
            >
              <tr>
                <td
                  style="
                    vertical-align: middle;
                    padding-right: 8px;
                    font-size: 14px;
                    line-height: 1;
                  "
                >
                  ⚙️
                </td>
                <td style="vertical-align: middle">
                  <span
                    style="
                      font-size: 12px;
                      color: #8898aa;
                      font-family: Arial, sans-serif;
                    "
                  >
                    <strong style="color: #5a6a85; font-weight: 600"
                      >Message automatique</strong
                    >
                    — envoyé chaque mercredi à 14h00
                  </span>
                </td>
              </tr>
            </table>

            <!-- Thin divider -->
            <table
              role="presentation"
              cellpadding="0"
              cellspacing="0"
              border="0"
              width="100%"
              style="border-collapse: collapse; margin-bottom: 18px"
            >
              <tr>
                <td
                  height="1"
                  bgcolor="#dce6f5"
                  style="
                    height: 1px;
                    background-color: #dce6f5;
                    font-size: 0;
                    line-height: 0;
                  "
                >
                  &nbsp;
                </td>
              </tr>
            </table>

            <!-- Footer text -->
            <p
              style="
                margin: 0 0 14px;
                font-size: 12px;
                color: #8898aa;
                text-align: center;
                line-height: 1.6;
                font-family: Arial, sans-serif;
              "
            >
              Merci de ne pas répondre directement à cet email.<br />
              Pour toute assistance, contactez l'équipe support.
            </p>

            <!-- Recipient pill -->
            <p style="text-align: center; margin: 0">
              <span
                style="
                  display: inline-block;
                  padding: 4px 14px;
                  background-color: #ffffff;
                  border: 1px solid #dce6f5;
                  border-radius: 30px;
                  font-size: 11px;
                  color: #8898aa;
                  font-family: Arial, sans-serif;
                "
              >
                pascal.briffard@edf.fr
              </span>
            </p>
          </Column>
        </Row>
      </Section>

      <!-- ────────────────────────────────────────────────────────
           BOTTOM ACCENT BAR — Closes the card
      ────────────────────────────────────────────────────────── -->
      <Section
        bgcolor="#2c4a80"
        class="bg-[#2c4a80] px-0 py-0"
        style="background-color: #2c4a80; padding: 0"
      >
        <Row>
          <Column
            bgcolor="#2c4a80"
            style="
              height: 4px;
              line-height: 4px;
              font-size: 4px;
              background-color: #2c4a80;
            "
          >
            &nbsp;
          </Column>
        </Row>
      </Section>
    </Container>
  </Layout>
</template>
